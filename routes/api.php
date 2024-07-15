<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, "login"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('me', [AuthController::class, "me"]);
});
