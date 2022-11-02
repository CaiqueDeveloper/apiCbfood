<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetOrDeleteRequest;
use App\Http\Requests\permission\StoragePermissionRequest;
use App\Http\Requests\permission\UpdatePermissionRequest;
use App\Models\Module;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }
    protected function storagePermission(StoragePermissionRequest $request){
        
       return Module::storagePermission($request->all());
    }
    protected function getAllPermissions(){
        
        return Module::getAllPermissions();
    }
    protected function getPermission(GetOrDeleteRequest $request){
        
        return Module::getPermission($request->only('id'));
    }
    protected function updatePermission(UpdatePermissionRequest $request){
        
        return Module::updatePermission($request->except('id'),$request->only('id'));
    }
    protected function deletePermission(GetOrDeleteRequest $request){
        
        return Module::deletePermission($request->only('id'));
    }
}
