<?php

use App\Http\Controllers\api\UserController;

Route::post('storageUser', [UserController::class, 'storageUser']);
Route::get('getUser', [UserController::class, 'getUser']);
Route::get('getAllUsers', [UserController::class, 'getAllUsers']);
Route::put('updateUser', [UserController::class, 'updateUser']);