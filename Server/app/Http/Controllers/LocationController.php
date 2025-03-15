<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Services\LocationService;

class LocationController
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        return $this->locationService->index();
    }

    public function show($id)
    {
        return $this->locationService->show($id);
    }
    public function store(LocationRequest $request)
    {
        return $this->locationService->store($request);
    }

    public function getUserLocations()
    {
        return $this->locationService->getUserLocations();
    }
}
