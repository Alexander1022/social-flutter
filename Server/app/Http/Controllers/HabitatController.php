<?php

namespace App\Http\Controllers;

use App\Services\HabitatService;
use App\Http\Requests\HabitatRequest;

class HabitatController
{
    protected $habitatService;

    public function __construct(HabitatService $habitatService)
    {
        $this->habitatService = $habitatService;
    }

    public function index()
    {
        return $this->habitatService->index();
    }

    public function show($id)
    {
        return  $this->habitatService->show($id);
    }

    public function store(HabitatRequest $request)
    {
        return $this->habitatService->store($request);
    }
    
    public function destroy($id)
    {
        return $this->habitatService->destroy($id);
    }
}