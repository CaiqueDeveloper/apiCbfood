<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\profileUsers\AssociatingProfileToUsersRequest;
use App\Models\ProfilesUser;
use Illuminate\Http\Request;

class ProfilesUserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }
    protected function associatingProfileToUser(AssociatingProfileToUsersRequest $request){

        return ProfilesUser::associatingProfileToUser($request->all());
    }
    protected function removeAssociatingProfileToUser(AssociatingProfileToUsersRequest $request){

        return ProfilesUser::removeAssociatingProfileToUser($request->all());
    }
}
