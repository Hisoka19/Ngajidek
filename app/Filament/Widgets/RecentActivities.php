<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Pembayaran;
// use App\Models\Kelas;
use Filament\Widgets\Widget;

class RecentActivities extends Widget
{
    protected static string $view = 'widgets.recent-activities';

    protected static ?int $sort = 2;

    public function getRecentUsers()
    {
        return User::latest()->limit(5)->get();
    }

    public function getRecentPayments()
    {
        return Pembayaran::latest()->limit(5)->get();
    }

    public function getRecentClasses()
    {
       // return Kelas::latest()->limit(5)->get();
    }
}
