<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Pengajar;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;


class UserStatistics extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count())->description('Jumlah pengguna terdaftar'),
            Card::make('Kelas Aktif', Kelas::where('status', 'aktif')->count())->description('Jumlah kelas'),
            Card::make('Total Pendapatan', 'Rp ' . number_format(Pembayaran::sum('jumlah'), 0, ',', '.'))
                ->description('Pendapatan dari kelas'),
            Card::make('Total Pengajar', Pengajar::count())->description('Jumlah pengajar aktif'),
               Card::make('Status Database', DB::connection()->getDatabaseName() ? '🟢 Terhubung' : '🔴 Tidak Terhubung'),
        ];
    }
}

class UserStats extends ChartWidget
{
    protected static ?string $heading = 'User Statistics';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $labels = ['Siswa'];
        $data = [
            User::where('role', 'siswa')->count(),
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Total Users',
                    'data' => $data,
                    'backgroundColor' => ['#3b82f6', '#f97316', '#10b981'],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Bisa 'line', 'pie', 'doughnut', 'bar'
    }

    protected function getStats(): array
    {
        return [
            'users' => User::where('role', 'siswa')->count(),
        ];
    }
}
