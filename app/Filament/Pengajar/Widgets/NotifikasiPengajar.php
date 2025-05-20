<?php

namespace App\Filament\Pengajar\Widgets;

use Filament\Widgets\Widget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\DatabaseNotification;

class NotifikasiPengajar extends Widget
{
    protected static string $view = 'filament.widgets.notifikasi-pengajar';

    protected function getTableQuery(): Builder
    {
        return auth()->user()->notifications()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('data.message')
                ->label('Pesan')
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal')
                ->sortable()
                ->dateTime(),
        ];
    }
    public function toDatabase($notifiable)
{
    return [
        'message' => 'Anda memiliki kelas baru yang dijadwalkan!',
        'url' => url('/pengajar/jadwal-zoom'),
    ];
}

}
