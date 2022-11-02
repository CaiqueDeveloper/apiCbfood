<?php

use App\Http\Controllers\api\PermissionController;

Route::post('permission/storagePermission', [PermissionController::class, 'storagePermission']);
Route::get('permission/getAllPermissions',[PermissionController::class, 'getAllPermissions']);
Route::get('permission/getPermission',[PermissionController::class, 'getPermission']);
Route::put('permission/updatePermission',[PermissionController::class, 'updatePermission']);
Route::delete('permission/deletePermission',[PermissionController::class, 'deletePermission']);