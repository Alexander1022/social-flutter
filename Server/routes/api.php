<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);