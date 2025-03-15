<?php

namespace App\Http\Controllers;

class SpecieController
{
    protected $specieService;

    public function __construct(SpecieService $specieService)
    {
        $this->specieService = $specieService;
    }

    public function index()
    {
        $species = $this->specieService->getAll();
        return SpecieResource::collection($species);
    }

    public function show($id)
    {
        $specie = $this->specieService->getById($id);
        return new SpecieResource($specie);
    }
}