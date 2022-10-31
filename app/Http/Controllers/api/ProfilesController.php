<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\profile\GetOrDeleteProfileReques;
use App\Http\Requests\profile\StorageProfileRequest;
use App\Http\Requests\profile\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
class ProfilesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }
    protected function getAllProfiles(){

        return Profile::getAllProfiles();
    }
    protected function getProfile(GetOrDeleteProfileReques $request){

        return Profile::getProfile($request->only('id'));
    }
    protected function storageProfile(StorageProfileRequest $request){

        return Profile::storageProfile($request->all());
    }
    protected function updateProfile(UpdateProfileRequest $request){

        return Profile::updateProfile($request->except('id'), $request->only('id'));
    }
    protected function deleteProfile(GetOrDeleteProfileReques $request){

        return Profile::deleteProfile($request->only('id'));
    }
}
