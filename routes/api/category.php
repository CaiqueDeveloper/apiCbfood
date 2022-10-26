<?php

use App\Http\Controllers\api\CategoryController;

Route::post('storageCategory', [CategoryController::class, 'storage']);
Route::put('updateCategory', [CategoryController::class, 'updateCategory']);
Route::delete('deleteCategory', [CategoryController::class, 'deleteCategory']);
Route::get('getAllCategory', [CategoryController::class, 'getAllCategory']);