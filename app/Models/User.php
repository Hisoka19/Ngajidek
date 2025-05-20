<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser; // ✅ Pakai namespace yang benar
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'age',
        'whatsapp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isSiswa()
    {
        return $this->hasRole('siswa');
    }

    // Pastikan hanya user dengan role 'admin' atau 'pengajar' bisa akses Filament
public function canAccessPanel(Panel $panel): bool
{
    \Log::info('Panel ID: ' . $panel->getId());
    \Log::info('User: ', ['id' => $this->id, 'email' => $this->email, 'roles' => $this->getRoleNames()]);

    $canAccess = match ($panel->getId()) {
        'admin' => $this->hasRole('admin', 'web'),
        'pengajar' => $this->hasRole('pengajar', 'pengajar'),
        default => false,
    };

    \Log::info('Can Access Panel: ' . ($canAccess ? 'Yes' : 'No'));

    return $canAccess;
}


}
