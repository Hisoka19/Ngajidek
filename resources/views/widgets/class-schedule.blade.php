<x-filament::widget>
    <x-filament::card>
        <h3 class="text-lg font-bold">Jadwal Kelas Mendatang</h3>
        <ul class="mt-2">
            @foreach($this->getUpcomingClasses() as $kelas)
                <li>📅 {{ $kelas->judul }} - {{ \Carbon\Carbon::parse($kelas->tanggal_mulai)->format('d M Y, H:i') }}</li>
            @endforeach
        </ul>
    </x-filament::card>
</x-filament::widget>
