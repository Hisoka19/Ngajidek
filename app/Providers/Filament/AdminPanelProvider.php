<?php

namespace App\Providers\Filament;

use Filament\Facades\Filament;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Filament\Admin\Resources\PengajarResource;
use App\Filament\Admin\Resources\SiswaResource;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->login()
            ->authGuard('web')
            ->darkMode(true)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->resources([
                SiswaResource::class,
                PengajarResource::class,
            ])
            ->pages([
                \App\Filament\Admin\Pages\Dashboard::class,
            ])
            ->navigationGroups([
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Admin Panel')
                    ->icon('heroicon-o-home'),
            ])
            ->authMiddleware([
                \Filament\Http\Middleware\Authenticate::class . ':web',
            ])
            ->middleware([
                \Illuminate\Cookie\Middleware\EncryptCookies::class,
                \Illuminate\Session\Middleware\StartSession::class,
                \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
                \Filament\Http\Middleware\DisableBladeIconComponents::class,
                \Filament\Http\Middleware\DispatchServingFilamentEvent::class,
            ]);
            //->canAccess(fn () => auth()->check() && auth()->user()->hasRole('admin'));
    }
}
