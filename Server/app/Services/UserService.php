<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function createUser(array $data): User
    {
        return User::create($data);
    }

    public function updateUser(User $user, array $data): bool
    {
        return $user->update($data);
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}
