<?php

use App\Http\Controllers\api\CategoryController;

Route::post('category/storageCategory', [CategoryController::class, 'storage']);
Route::put('category/updateCategory', [CategoryController::class, 'updateCategory']);
Route::delete('category/deleteCategory', [CategoryController::class, 'deleteCategory']);
Route::get('category/getAllCategory', [CategoryController::class, 'getAllCategory']);
Route::get('category/getCategory', [CategoryController::class, 'getCategory']);