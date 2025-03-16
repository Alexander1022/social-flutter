<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecieRequest;
use App\Services\SpecieService;
use Illuminate\Http\Request;

class SpecieController
{
    protected $specieService;

    public function __construct(SpecieService $specieService)
    {
        $this->specieService = $specieService;
    }

    public function index(Request $request)
    {
        return $this->specieService->index($request);
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