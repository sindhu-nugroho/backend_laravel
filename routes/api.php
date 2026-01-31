<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\MailController;

Route::post('/login-sanctum', [AuthController::class, 'loginSanctum']);
Route::post('/login-jwt', [AuthController::class, 'loginJwt']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/products', ProductController::class);
});

Route::middleware('auth:sanctum')->post('/send-email', [MailController::class, 'send']);