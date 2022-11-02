<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'label', 'url', 'menu_name', 'icon_class', 'has_modules', 'order_list'];

    protected static function storagePermission($data){
        
        if(Module::updateOrCreate($data, $data)){

            return response()->json(['message' => 'Success, Permission Registered', 'status' => 200], 200);

        }else{
            
            return response()->json(['message' => 'Error, Permission Registered', 'status' => 422], 422);

        }
    }
    protected static function getAllPermissions(){

        $permissions = Module::all();

        if(sizeof($permissions) <= 0){

            return response()->json(['message' => 'No permissions have yet been registered', 'status' => 422], 422);
        }

        return $permissions;
    }
    protected static function getPermission($id){

        $permission = Module::where($id)->get();

        if(sizeof($permission) <= 0){

            return response()->json(['message' => 'Permission Not found', 'status' => 404], 404);
        }

        return $permission;
    }
    protected static function updatePermission($data, $id){
        
        $permission = Module::where($id)->get();
        
        if(sizeof($permission) <= 0){
            
            return response()->json(['message' => 'Permission Not found', 'status' => 404], 404);
        }
        
        if($permission[0]->update($data)){
            
            return response()->json(['message' => 'Success, Permission Update', 'status' => 200], 200);
            
        }else{
            
            return response()->json(['message' => 'Error, Permission Update', 'status' => 422], 422);
            
        }
    }
    protected static function deletePermission($id){

        $permission = Module::where($id)->get();

        if(sizeof($permission) <= 0){

            return response()->json(['message' => 'Permission Not found', 'status' => 404], 404);
        }

        if($permission[0]->delete()){
            
            return response()->json(['message' => 'Success, Permission Deleted', 'status' => 200], 200);
            
        }else{
            
            return response()->json(['message' => 'Error, Permission Deleted', 'status' => 422], 422);
            
        }
    }
    
}
