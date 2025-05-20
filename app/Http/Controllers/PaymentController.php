<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\ClassModel;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function initMidtrans()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createPayment(ClassModel $class, Request $request)
    {
        $this->initMidtrans();

        if (!$class->exists || $class->price <= 0) {
            return response()->json(['error' => 'Kelas atau harga tidak valid.'], 400);
        }

        $orderId = 'order_' . uniqid();
        $transactionData = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $class->price,
            ],
            'item_details' => [[
                'id' => 'class_' . $class->id,
                'price' => $class->price,
                'quantity' => 1,
                'name' => $class->title,
            ]],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone ?? '08123456789',
            ],
            'callbacks' => [
                'finish' => route('payment.success', ['order_id' => $orderId]),
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($transactionData);

            Transaction::create([
                'order_id' => $orderId,
                'user_id' => auth()->id(),
                'class_id' => $class->id,
                'amount' => $class->price,
                'status' => 'pending',
                'raw_response' => json_encode($transactionData)
            ]);

            return response()->json(['snap_token' => $snapToken]);

        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Gagal membuat transaksi.',
                'debug' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function paymentCallback(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required',
            'transaction_status' => 'required',
            'gross_amount' => 'required|numeric',
            'signature_key' => 'required'
        ]);

        $signatureKey = hash("sha512",
            $validated['order_id'] .
            $request->status_code .
            $validated['gross_amount'] .
            env('MIDTRANS_SERVER_KEY')
        );

        if ($signatureKey !== $validated['signature_key']) {
            Log::warning('Invalid Midtrans Signature: ' . $request->order_id);
            return response()->json(['message' => 'Signature tidak valid.'], 403);
        }

        $transaction = Transaction::where('order_id', $validated['order_id'])->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan.'], 404);
        }

        switch ($validated['transaction_status']) {
            case 'settlement':
                $transaction->update([
                    'status' => 'paid',
                    'payment_method' => $request->payment_type
                ]);
                // Berikan akses kelas ke user
                break;
            case 'expire':
            case 'cancel':
                $transaction->update(['status' => $validated['transaction_status']]);
                break;
        }

        return response()->json(['message' => 'Callback berhasil diproses.']);
    }

    public function paymentSuccess(Request $request)
    {
        $transaction = Transaction::where('order_id', $request->order_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($transaction->status !== 'paid') {
            return redirect()->route('payment.failed');
        }

        return view('payment.success', [
            'order_id' => $request->order_id,
            'class' => $transaction->class
        ]);
    }
}
