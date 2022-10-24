<?php

use App\Http\Controllers\api\auth\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('me', [AuthController::class, 'me']);
Route::post('refresh', [AuthController::class, 'refresh']);