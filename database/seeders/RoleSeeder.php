<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah role sudah ada sebelum membuat
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin', 'guard_name' => 'web']);
        }

        if (!Role::where('name', 'pengajar')->exists()) {
            Role::create(['name' => 'pengajar', 'guard_name' => 'web']);
        }

        if (!Role::where('name', 'user')->exists()) {
            Role::create(['name' => 'user', 'guard_name' => 'web']);
        }
    }
}
