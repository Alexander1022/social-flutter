<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecieRequest;
use App\Services\SpecieService;

class SpecieController
{
    protected $specieService;

    public function __construct(SpecieService $specieService)
    {
        $this->specieService = $specieService;
    }

    public function index()
    {
        return $this->specieService->index();
    }

    public function show($id)
    {
        return $this->specieService->show($id);
    }

    public function store(SpecieRequest $request)
    {
        return $this->specieService->store($request);
    }
}