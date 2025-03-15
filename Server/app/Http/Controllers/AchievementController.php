<?php

namespace App\Http\Controllers;

use App\Http\Requests\AchievementRequest;
use App\Services\AchievementService;

class AchievementController
{
    protected $achievementService;

    public function __construct(AchievementService $achievementService)
    {
        $this->achievementService = $achievementService;
    }

    public function index()
    {
        return $this->achievementService->index();
    }

    public function show($id)
    {
        return $this->achievementService->show($id);
    }

    public function store(AchievementRequest $request)
    {
        return $this->achievementService->store($request);    
    }
}