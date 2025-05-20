<?php

return [

    'auth' => [
        'guard' => 'web', // Guard yang digunakan
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'pages' => [
        'login' => \Filament\Http\Livewire\Auth\Login::class, // Halaman login Filament
    ],

    'path' => 'admin', // Path untuk dashboard admin

    'panels' => [
        App\Providers\Filament\AdminPanelProvider::class, // Provider panel admin
    ],

    'broadcasting' => [
        // Uncomment jika ingin menggunakan Pusher atau layanan broadcasting lainnya
        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        //     'forceTLS' => true,
        // ],
    ],

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    'assets_path' => null,

    'cache_path' => base_path('bootstrap/cache/filament'),

    'livewire_loading_delay' => 'default',

];
