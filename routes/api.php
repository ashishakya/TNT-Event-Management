<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Event\EventController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, "login"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('me', [AuthController::class, "me"]);
    Route::apiResource("events", EventController::class);
});
