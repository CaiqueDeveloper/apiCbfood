<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorageCompanyRequest;
use App\Http\Requests\StorageUserRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class RequestYourDemoController extends Controller
{
    /**
     * Undocumented function
     *
     * @param StorageUserRequest $request
     * @return void
     */
    protected function storageUser(StorageUserRequest $request){
        
        return User::storage($request->except('password_confirmed'));
    }

    protected function storageCompany(StorageCompanyRequest $request){
        
        return Company::storage($request->all());
    }
}
