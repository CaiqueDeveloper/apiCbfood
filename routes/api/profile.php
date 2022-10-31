<?php


use App\Http\Controllers\api\ProfilesController;

Route::get('profile/getAllProfiles', [ProfilesController::class, 'getAllProfiles']);
Route::get('profile/getProfile', [ProfilesController::class, 'getProfile']);
Route::post('profile/storageProfile', [ProfilesController::class , 'storageProfile']);
Route::put('profile/updateProfile', [ProfilesController::class, 'updateProfile']);
Route::delete('profile/deleteProfile', [ProfilesController::class, 'deleteProfile']);