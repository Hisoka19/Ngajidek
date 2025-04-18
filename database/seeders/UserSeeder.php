<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ngaji.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Pengajar 1',
            'email' => 'pengajar@ngaji.com',
            'password' => Hash::make('password'),
            'role' => 'pengajar'
        ]);
        User::create([
    'name' => 'Putri',
    'email' => 'Putri@ngajidek.com',
    'password' => bcrypt('ustadzah123'),
    'role' => 'pengajar', // Jika masih menyimpan di tabel users
])->assignRole('pengajar');
    }
}
