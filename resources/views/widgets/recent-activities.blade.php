<x-filament::widget>
    <x-filament::card>
        <h3 class="text-lg font-bold">Recent Activities</h3>
        <ul class="mt-2">
            @foreach($this->getRecentUsers() as $user)
                <li>🟢 {{ $user->name }} baru saja bergabung.</li>
            @endforeach
            @foreach($this->getRecentPayments() as $payment)
                <li>💰 {{ $payment->user->name }} melakukan pembayaran Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</li>
            @endforeach
        </ul>
    </x-filament::card>
</x-filament::widget>
