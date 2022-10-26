<?php

use App\Http\Controllers\api\UserController;

Route::post('storageUser', [UserController::class, 'storageUser']);