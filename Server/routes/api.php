<?php

use App\Http\Controllers\HabitatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\SpecieTypeController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\UserAchievementController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::resource('locations', LocationController::class);
    Route::get('user', [UserController::class, 'getUser']);

    Route::resource('species', SpecieController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
    Route::resource('specie-types', SpecieTypeController::class)->only(['index', 'show', 'store', 'destroy']);
    Route::resource('habitats', HabitatController::class)->only(['index', 'show', 'store', 'destroy']);
    Route::resource('achievements', AchievementController::class)->only(['index', 'show', 'update', 'store', 'destroy']);
    Route::get('/user/my-locations', [LocationController::class, 'getUserLocations']);
    Route::post('/assign-achievement-points', [UserAchievementController::class, 'assignPoints']);
});