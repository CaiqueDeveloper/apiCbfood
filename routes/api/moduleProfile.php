<?php

use App\Http\Controllers\api\ModulesProfileController;

Route::post('moduleProfiles/associateModuleWithProfile', [ModulesProfileController::class , 'associateModuleWithProfile']);
Route::delete('moduleProfiles/removeassociateModuleWithProfile', [ModulesProfileController::class , 'removeassociateModuleWithProfile']);