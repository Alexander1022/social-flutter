<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\SpecieTypeController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::resource('locations', LocationController::class);
    Route::get('user', [UserController::class, 'getUser']);

    Route::resource('species', SpecieController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
    Route::resource('specie-types', SpecieTypeController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
});