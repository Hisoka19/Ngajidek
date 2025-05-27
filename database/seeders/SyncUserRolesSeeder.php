<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class SyncUserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder will synchronize the Spatie roles
     * with the 'role' field in the users table.
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Only sync if the user has a value in the 'role' field
            if ($user->role) {
                // Sync role in Spatie with the value from the user's 'role' column
                $user->syncRoles([$user->role]);
                $this->command->info("User {$user->email} synced to role '{$user->role}'");
            }
        }
    }
}
