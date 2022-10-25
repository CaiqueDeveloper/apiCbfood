<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('auth')->group(base_path('routes/api/auth/auth.php'));
Route::prefix('panel')->group(base_path('routes/api/dashboard.php'));
Route::prefix('panel')->group(base_path('routes/api/users.php'));
Route::prefix('panel')->group(base_path('routes/api/company.php'));
Route::prefix('panel')->group(base_path('routes/api/settingCompany.php'));
Route::prefix('panel')->group(base_path('routes/api/category.php'));
Route::prefix('panel')->group(base_path('routes/api/product.php'));
Route::prefix('panel')->group(base_path('routes/api/additional.php'));
Route::prefix('panel')->group(base_path('routes/api/order.php'));
Route::prefix('panel')->group(base_path('routes/api/permission.php'));
Route::prefix('panel')->group(base_path('routes/api/profile.php'));
Route::prefix('panel')->group(base_path('routes/api/moduleProfile.php'));
Route::prefix('panel')->group(base_path('routes/api/profileUser.php'));
Route::prefix('panel')->group(base_path('routes/api/deliverymen.php'));
Route::prefix('panel')->group(base_path('routes/api/systemUsability.php'));
Route::prefix('panel')->group(base_path('routes/api/ultils.php'));
Route::prefix('panel')->group(base_path('routes/api/report.php'));
