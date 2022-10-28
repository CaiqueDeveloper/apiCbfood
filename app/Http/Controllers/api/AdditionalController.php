<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\additional\StorageAdditionalRequest;
use App\Http\Requests\additional\UpdateAdditionalRequest;
use App\Http\Requests\additional\GetAdditionalRequest;
use App\Models\Additional;
use Illuminate\Http\Request;

class AdditionalController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:api');
    }

    protected function storageAdditional(StorageAdditionalRequest $request){
        
        return Additional::storageAdditional($request->only('name'));
    }
    protected function getAllAdditionals(){
        
        return  Additional::getAllAdditionals();
    }
    protected function updateAdditional(UpdateAdditionalRequest $request){

        return Additional::updateAdditional($request->except('id'), $request->id);
    }
    protected function getAdditional(GetAdditionalRequest $request){

        return Additional::getAdditional($request->id);
    }
    protected function deleteAdditional(GetAdditionalRequest $request){

        return Additional::deleteAdditional($request->id);
    }
}
