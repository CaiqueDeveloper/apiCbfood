<?php

use App\Http\Controllers\api\CompanyController;

Route::post('company/storageCompany', [CompanyController::class, 'storageCompany']);
Route::get('company/getCompany', [CompanyController::class, 'getCompany']);
Route::get('company/getAllCompaniesUser', [CompanyController::class, 'getAllCompaniesUser']);
Route::put('company/updateCompany', [CompanyController::class, 'updateCompany']);
Route::delete('company/deleteCompany', [CompanyController::class, 'deleteCompany']);