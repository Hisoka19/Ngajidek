<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Filament\Pengajar\Resources\KelasResource;
use Filament\Http\Middleware\Authenticate;
use Spatie\Permission\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Gate;


class PengajarPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
{
    $user = auth()->user(); // Ambil pengguna yang terautentikasi

    \Log::info('Panel ID: pengajar');
    \Log::info('User: ', ['user' => $user]);

    // Cek apakah pengguna terautentikasi
    if ($user) {
        \Log::info('Can Access Panel: ', ['can_access' => $user->hasRole('pengajar')]);
    } else {
        \Log::info('User is not authenticated');
    }

    return $panel
        ->id('pengajar')
        ->path('pengajar')
        ->login()
        ->authGuard('web') // Pastikan ini sesuai dengan guard yang digunakan
        ->darkMode(true)
        ->colors([
            'primary' => Color::Amber,
        ])
        ->resources([
            KelasResource::class,
        ])
        ->pages([
            \App\Filament\Pengajar\Pages\Dashboard::class,
        ])
        ->navigationGroups([
            \Filament\Navigation\NavigationGroup::make()
                ->label('Pengajar Panel')
                ->icon('heroicon-o-academic-cap'),
            \Filament\Navigation\NavigationGroup::make('Kelas')
                ->icon('heroicon-o-book-open'),
        ])
        ->authMiddleware([
            \Filament\Http\Middleware\Authenticate::class . ':web',
            \Spatie\Permission\Middleware\RoleMiddleware::class . ':pengajar', // Pastikan ini ada
        ])
        ->middleware([
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Filament\Http\Middleware\DisableBladeIconComponents::class,
            \Filament\Http\Middleware\DispatchServingFilamentEvent::class,
        ]);
}
}
