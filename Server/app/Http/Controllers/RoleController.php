<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Services\RoleService;

class RoleController
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAll();
        return RoleResource::collection($roles);
    }

    public function show($id)
    {
        $role = $this->roleService->getById($id);
        return new RoleResource($role);
    }
}
