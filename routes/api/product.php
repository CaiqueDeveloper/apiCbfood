<?php

use App\Http\Controllers\api\ProductsController;

Route::post('product/storageProduct', [ProductsController::class, 'storageProduct']);
Route::get('product/getProducts', [ProductsController::class, 'getProducts']);