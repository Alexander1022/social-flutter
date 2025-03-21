<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleService
{
    public function getAll(): Collection
    {
        return Role::all();
    }

    public function getById(int $id): ?Role
    {
        try {
            return Role::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'No such location found'], 404);
        }
    }
}
