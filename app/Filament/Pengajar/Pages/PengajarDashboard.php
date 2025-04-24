<?php

namespace App\Filament\Pengajar\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class PengajarDashboard extends BaseDashboard
{
    public static function route(): string
    {
        return '/pengajar'; // Pastikan ini sesuai dengan path di PengajarPanelProvider
    }

    public function getWidgets(): array
    {
        return [
            // Tambahkan widget yang relevan untuk pengajar
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            // Tambahkan widget header jika diperlukan
        ];
    }
}
