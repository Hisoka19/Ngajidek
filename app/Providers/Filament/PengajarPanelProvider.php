<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;

class PengajarPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('pengajar')
            ->path('pengajar')
            ->login()
            ->authMiddleware([
                \Filament\Http\Middleware\Authenticate::class . ':web',
                \Spatie\Permission\Middleware\RoleMiddleware::class . ':pengajar', // Pastikan hanya pengajar
            ]);
    }
}
