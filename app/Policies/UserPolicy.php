<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    // Cek apakah pengguna adalah pengajar
    public function accessPengajarPanel(User $user)
    {
        return $user->hasRole('pengajar');
    }
}
