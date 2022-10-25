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
        
        return response()->json(User::storage($request->except('password_confirmed'), true));
    }

    protected function storageCompany(StorageCompanyRequest $request){
        
        return response()->json(Company::storage($request->all()));
    }
}
