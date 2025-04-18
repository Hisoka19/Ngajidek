<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static string $view = 'filament.admin.pages.dashboard'; // Pastikan view ini ada

    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }
}
