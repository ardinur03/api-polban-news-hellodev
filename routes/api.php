<?php

use App\Http\Controllers\API\NewController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::get('news', [NewController::class, 'all']);
Route::get('news-slides', [NewController::class, 'slides']);

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('logout', [UserController::class, 'logout']);
});
