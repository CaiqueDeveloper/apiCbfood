<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilesUser extends Model
{
    use HasFactory;
    protected  $table = 'profile_user';
    protected $fillable = ['profile_id', 'user_id'];

    protected static function AssociateUserWithProfile($data, $is_request_your_demo = null){
       
        if($is_request_your_demo == true){
            $data['profile_id']  = Profile::where('name', 'manager')->value('id');
        } 
        return ProfilesUser::updateOrCreate($data,$data);
    }
    protected static function associatingProfileToUser($data){

        if(User::existUser($data['user_id']) === false || Profile::existProfile($data['profile_id']) === false){

            return response()->json(['message' => 'User or profile entered not found', 'status' => 404], 404);
        }

        if(self::AssociateUserWithProfile($data)){
            
            return response()->json(['message' => 'Association made successfully', 'status' => 200], 200);
        }else{
            
            return response()->json(['message' => 'Error Association', 'status' => 422], 422);
        }
    }
    protected static function removeAssociatingProfileToUser($data){

        if(User::existUser($data['user_id']) === false || Profile::existProfile($data['profile_id']) === false){

            return response()->json(['message' => 'User or profile entered not found', 'status' => 404], 404);
        }

        if(ProfilesUser::where($data)->delete()){
            
            return response()->json(['message' => 'Association Removed made successfully', 'status' => 200], 200);
        }else{
            
            return response()->json(['message' => 'Error Association Removed', 'status' => 422], 422);
        }
    }
}
