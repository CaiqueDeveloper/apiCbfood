<?php

use App\Http\Controllers\api\AdditionalItemsController;

Route::post('additional/storageAdditionalItem',[AdditionalItemsController::class, 'storageAdditionalItem']);
Route::get('additional/getItemAdditional', [AdditionalItemsController::class, 'getItemAdditional']);
Route::delete('additional/deleteItemAdditional', [AdditionalItemsController::class, 'deleteItemAdditional']);
Route::put('additional/updateItemAdditional', [AdditionalItemsController::class, 'updateItemAdditional']);