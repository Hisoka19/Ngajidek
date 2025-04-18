<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Midtrans\Config;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('manage-kelas', function ($user) {
            return $user->hasRole('admin'); // Hanya admin yang bisa CRUD kelas
        });

    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;
}
}
