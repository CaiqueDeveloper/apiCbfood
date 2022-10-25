<?php

use App\Http\Controllers\api\RequestYourDemoController;

Route::post('storageCompany', [RequestYourDemoController::class, 'storageCompany']);
Route::post('storageUser', [RequestYourDemoController::class, 'storageUser']);
Route::get('getUser', [RequestYourDemoController::class, 'getUser']);