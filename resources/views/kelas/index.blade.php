@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Kelas Saya</h2>

    @if($transactions->isEmpty())
        <p class="text-gray-600">Anda belum memiliki kelas yang diikuti.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($transactions as $transaction)
                <div class="border rounded-lg p-4 shadow-md bg-white">
                    <h3 class="text-lg font-semibold">{{ $transaction->class->title }}</h3>
                    <p class="text-gray-700">Harga: Rp{{ number_format($transaction->class->price, 0, ',', '.') }}</p>
                    <p class="text-gray-600">
                        Status:
                        @if($transaction->status == 'paid')
                            <span class="text-green-600 font-semibold">Lunas</span>
                        @elseif($transaction->status == 'pending')
                            <span class="text-yellow-600 font-semibold">Menunggu Pembayaran</span>
                        @else
                            <span class="text-red-600 font-semibold">Gagal / Dibatalkan</span>
                        @endif
                    </p>

                    @if($transaction->status == 'paid')
                        <a href="{{ route('kelas.show', $transaction->class_id) }}"
                           class="mt-4 block bg-blue-600 text-white text-center py-2 rounded-md">
                           Akses Kelas
                        </a>
                    @else
                        <p class="text-red-500 text-sm mt-2">Selesaikan pembayaran untuk mengakses kelas.</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
