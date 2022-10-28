<?php

use App\Http\Controllers\api\AdditionalController;

Route::post('additional/storageAdditional', [AdditionalController::class, 'storageAdditional']);
Route::get('additional/getAdditional', [AdditionalController::class, 'getAdditional']);
Route::get('additional/getAllAdditionals', [AdditionalController::class, 'getAllAdditionals']);
Route::put('additional/updateAdditional', [AdditionalController::class, 'updateAdditional']);
Route::delete('additional/deleteAdditional', [AdditionalController::class, 'deleteAdditional']);