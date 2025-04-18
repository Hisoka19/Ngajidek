<?php

namespace App\Filament\Pengajar\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pengajar.pages.dashboard';

    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }
}
