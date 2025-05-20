<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Payment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MidtransController extends Controller
{
    public function createTransaction(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
        ]);

        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = 'ORDER-' . time();
        $grossAmount = $request->amount;

        $payment = Payment::create([
            'user_id' => auth()->id(),
            'order_id' => $orderId,
            'amount' => $grossAmount,
            'status' => 'pending',
        ]);

        $transaction = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json(['snap_token' => $snapToken]);
        } catch (Exception $e) {
            $payment->update(['status' => 'failed']);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function notificationHandler(Request $request)
    {
        $payload = $request->getContent();
        $serverKey = config('services.midtrans.server_key');

        // Verifikasi signature
        $signatureKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($signatureKey != $request->signature_key) {
            return response()->json(['error' => 'Invalid signature'], Response::HTTP_FORBIDDEN);
        }

        $payment = Payment::where('order_id', $request->order_id)->firstOrFail();

        switch ($request->transaction_status) {
            case 'settlement':
                $payment->update(['status' => 'success']);
                // Berikan akses kelas ke user
                break;
            case 'expire':
            case 'cancel':
                $payment->update(['status' => 'failed']);
                break;
        }

        return response()->json(['status' => 'success']);
    }
}
