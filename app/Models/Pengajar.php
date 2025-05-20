<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Ubah dari Model ke Authenticatable
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Pengajar extends Authenticatable // Ubah dari Model ke Authenticatable
{
    use Notifiable, HasFactory, HasRoles; // Tambahkan HasRoles jika pakai Spatie Permission

    protected $guard = 'pengajar';

    protected $fillable = [
        'name', 'email', 'password', 'no_hp', 'alamat', // Sesuaikan dengan kolom di database
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Auto hash password jika di-set
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
