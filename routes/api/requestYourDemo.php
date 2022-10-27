<?php

use App\Http\Controllers\api\RequestYourDemoController;

Route::post('requestYourDemo/storageCompany', [RequestYourDemoController::class, 'storageCompany']);
Route::post('requestYourDemo/storageUser', [RequestYourDemoController::class, 'storageUser']);