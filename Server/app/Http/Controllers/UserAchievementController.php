<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAchievementRequest;
use App\Services\UserAchievementService;

class UserAchievementController
{
    protected $userAchievementService;

    public function __construct(UserAchievementService $userAchievementService)
    {
        $this->userAchievementService = $userAchievementService;
    }

   /*  public function index()
    {
        return $this->userAchievementService->index();
    }

    public function show($id)
    {
        return $this->userAchievementService->show($id);
    } */

    public function assignPoints(UserAchievementRequest $request)
    {
        return $this->userAchievementService->assignPoints($request);    
    }
}