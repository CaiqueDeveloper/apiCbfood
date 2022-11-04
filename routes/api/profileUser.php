<?php

use App\Http\Controllers\api\ProfilesUserController;

Route::post('profilesUser/associatingProfileToUser', [ProfilesUserController::class, 'associatingProfileToUser']);
Route::delete('profilesUser/removeAssociatingProfileToUser', [ProfilesUserController::class, 'removeAssociatingProfileToUser']);