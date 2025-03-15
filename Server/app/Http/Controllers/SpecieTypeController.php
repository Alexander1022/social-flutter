<?php

namespace App\Http\Controllers;

use App\Services\SpecieTypeService;
use App\Http\Requests\SpecieTypeRequest;

class SpecieTypeController
{
    protected $specieService;

    public function __construct(SpecieTypeService $specieService)
    {
        $this->specieService = $specieService;
    }

    public function index()
    {
        return $this->specieService->index();
    }

    public function show($id)
    {
        return  $this->specieService->show($id);
    }

    public function store(SpecieTypeRequest $request)
    {
        return $this->specieService->store($request);
    }
    
    public function destroy($id)
    {
        return $this->specieService->destroy($id);
    }
}