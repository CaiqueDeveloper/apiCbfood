<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\moduleProfiles\StorageModuleProfileRequest;
use App\Models\ModulesProfile;
use Illuminate\Http\Request;

class ModulesProfileController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }
    protected function associateModuleWithProfile(StorageModuleProfileRequest $request){

        return ModulesProfile::associateModuleWithProfile($request->all());
    }
    protected function removeassociateModuleWithProfile(StorageModuleProfileRequest $request){

        return ModulesProfile::removeassociateModuleWithProfile($request->all());
    }
}
