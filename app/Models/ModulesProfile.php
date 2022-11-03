<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesProfile extends Model
{
    use HasFactory;
    protected  $table = 'module_profile';
    protected $fillable = ['module_id', 'profile_id'];

    protected static function associateModuleWithProfile($data){

        if(Profile::existProfile($data['profile_id']) === false || Module::existModule($data['module_id']) === false){

            return response()->json(['message' => 'Mistake ! It is not possible to make the association the profile and/or module informed does not exist', 'status' => 404], 404);
        }

        if(ModulesProfile::updateOrCreate($data, $data)){

            return response()->json(['message' => 'Association made successfully', 'status' => 200], 200);
        }else{
            
            return response()->json(['message' => 'Error Association', 'status' => 422], 422);
        }
    }
    protected static function removeassociateModuleWithProfile($data){

        if(Profile::existProfile($data['profile_id']) === false || Module::existModule($data['module_id']) === false){

            return response()->json(['message' => 'Mistake ! It is not possible to make the association the profile and/or module informed does not exist', 'status' => 404], 404);
        }

        if(ModulesProfile::where($data)->delete()){

            return response()->json(['message' => 'Remove Association made successfully', 'status' => 200], 200);
        }else{
            
            return response()->json(['message' => 'Error Remove Association', 'status' => 422], 422);
        }
    }

}
