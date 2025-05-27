<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Filament\Siswa\Resources\MateriResource;

class SiswaPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('siswa')
            ->path('siswa')
            ->login()
            ->authGuard('web')
            ->darkMode(true)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->resources([
                \App\Filament\Siswa\Resources\MateriResource::class,
            ])
            ->pages([
                \App\Filament\Siswa\Pages\Dashboard::class,
            ])
            ->navigationGroups([
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Siswa Panel')
                    ->icon('heroicon-o-user-group'),
            ])
            ->authMiddleware([
                \Filament\Http\Middleware\Authenticate::class . ':web',
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
        //->canAccess(fn () => auth()->check() && auth()->user()->hasRole('siswa'));
    }
}
