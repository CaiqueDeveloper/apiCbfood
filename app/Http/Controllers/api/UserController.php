<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\ChangePasswordRequest;
use App\Http\Requests\user\DeleteUserRequest;
use App\Http\Requests\user\StorageUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }

    protected function storageUser(StorageUserRequest $request){
        
        return User::storage($request->all());
    }
    protected function getUser(Request $request){
        
        return User::getUser($request->id);
    }
    protected function getAllUsers(){
        
        return User::getAllUsers();
    }
    protected function updateUser(UpdateUserRequest $request){
        
        return User::updateUser($request->except('id'), $request->only('id'));
    }
    protected function deleteUser(DeleteUserRequest $request){

        return User::deleteUser($request->id);
    }
    protected function changePassword(ChangePasswordRequest $request){

        return User::changePassword($request->only('password'), $request->id);
    }
}
