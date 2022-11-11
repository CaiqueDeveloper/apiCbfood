<?php

use App\Http\Controllers\api\UserController;

Route::post('user/storageUser', [UserController::class, 'storageUser']);
Route::get('user/getUser', [UserController::class, 'getUser']);
Route::get('user/getAllUsers', [UserController::class, 'getAllUsers']);
Route::put('user/updateUser', [UserController::class, 'updateUser']);
Route::delete('user/deleteUser', [UserController::class, 'deleteUser']);
Route::put('user/changePassword', [UserController::class, 'changePassword']);
Route::post('user/storageAddress', [UserController::class , 'storageAddress']);
Route::get('user/getAllAddress', [UserController::class , 'getAllAddress']);
Route::get('user/getAddress', [UserController::class , 'getAddress']);
Route::put('user/updateAddress', [UserController::class , 'updateAddress']);
Route::delete('user/deleteAddress', [UserController::class , 'deleteAddress']);