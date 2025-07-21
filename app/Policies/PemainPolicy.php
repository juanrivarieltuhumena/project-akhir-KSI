<?php

namespace App\Policies;

use App\Models\Pemain;
use App\Models\User;

class PemainPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Pemain $pemain): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Pemain $pemain): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Pemain $pemain): bool
    {
        return $user->isAdmin();
    }
}
