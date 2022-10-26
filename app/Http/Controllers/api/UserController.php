<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\StorageUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }

    protected static function storageUser(StorageUserRequest $request){
        
        return User::storage($request->all());
    }
}
