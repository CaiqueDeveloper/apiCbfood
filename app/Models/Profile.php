<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable  = ['name','label'];

    protected static function getAllProfiles(){

        $data = Profile::all();
        
        if(sizeof($data) <= 0){

            return response()->json(['message' => 'There is no registered profile yet.', 'status' => 200], 200);
        }

        return $data;
    }
    protected static function getProfile($id){

        $data = Profile::where($id)->get();
        
        if(sizeof($data) <= 0){

            return response()->json(['message' => 'Profile Not found', 'status' => 404], 404);
        }

        return $data;
    }
    protected static function storageProfile($data){

        if(Profile::create($data)){
            return response()->json(['message' => 'Success, Registered Profile', 'status' => 200], 200);
        }else{
            return response()->json(['message' => 'Failed, Registered Profile', 'status' => 422], 422);
        }
    }
    protected static function updateProfile($response, $id){

        $data = Profile::where($id)->get();

        if(sizeof($data) <= 0){

            return response()->json(['message' => 'Profile Not found', 'status' => 404], 404);
        }

        if($data[0]->update($response)){
            return response()->json(['message' => 'Success, Update Profile', 'status' => 200], 200);
        }else{
            return response()->json(['message' => 'Failed, Update Profile', 'status' => 422], 422);
        }
    }
    protected static function deleteProfile($id){
        
        $data = Profile::where($id)->get();

        if(sizeof($data) <= 0){

            return response()->json(['message' => 'Profile Not found', 'status' => 404], 404);
        }

        if($data[0]->delete()){
            
            return response()->json(['message' => 'Success, Delete Profile', 'status' => 200], 200);
        }else{
            
            return response()->json(['message' => 'Failed, Delete Profile', 'status' => 422], 422);
        }
    }
    
   
}
