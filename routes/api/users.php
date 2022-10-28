<?php

use App\Http\Controllers\api\UserController;

Route::post('user/storageUser', [UserController::class, 'storageUser']);
Route::get('user/getUser', [UserController::class, 'getUser']);
Route::get('user/getAllUsers', [UserController::class, 'getAllUsers']);
Route::put('user/updateUser', [UserController::class, 'updateUser']);
Route::delete('user/deleteUser', [UserController::class, 'deleteUser']);