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
        
        $profile_id = 0;    

        if($is_request_your_demo == true){
            $profile_id = Profile::where('name', 'manager')->value('id');
        
        }
        $data['profile_id'] = $profile_id;

        return ProfilesUser::updateOrCreate($data,$data);
    }
}
