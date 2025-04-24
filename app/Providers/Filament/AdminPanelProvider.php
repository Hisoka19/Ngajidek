<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin') // ID panel admin
            ->path('admin') // Path untuk dashboard admin
            ->login(); // Gunakan login bawaan
    }

    public function canAccessPanel(): bool
    {
        return auth()->check() && auth()->user()->hasRole('admin'); // Akses hanya untuk admin
    }
}
