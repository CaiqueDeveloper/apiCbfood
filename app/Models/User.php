<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'number_phone',
        'company_id',
        'password',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * CONFIGURAÇÃO DA AUTENTICAÇÃO VIA JWT
     *
     * @return void
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function profiles(){

        return $this->belongsToMany(Profile::class);
    }
    public function hasModule(Module $module){

        return $this->hasAnyProfiles($module->profiles);
    }
    public function hasAnyProfiles($profiles){

        if(is_array($profiles) || is_object($profiles)){
            return !!$profiles->intersect($this->profiles)->count();
        }
        return $this->profiles->contains('name', $profiles->name);
    }
    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function companies(){
        return $this->belongsToMany(Company::class);
    }
    public function address(){
        return $this->morphMany(Address::class, 'addres_morph');
    }
    public function image(){
        return $this->morphMany(Images::class, 'imagebleMorph');
    }
    
   /**
    * Undocumented function
    *
    * @param [type] $data
    * @param [type] $is_request_your_demo
    * @return void
    */
    protected static function storage($data, $is_request_your_demo = null){
        
        $company_id = 0;
        $user_id = 0;
        $profile_id = isset($data['profile_id']) ? $data['profile_id'] : 0 ;
        
        if($is_request_your_demo === true){
            $company = Company::latest()->first();
            $company_id = $company->id;
        }else{
            
            $company_id = Auth::user()->company_id;
        }
        isset($data['profile_id']) ? array_pop($data) : $data;
        
        $data['company_id'] = $company_id;
        $data['password'] = Hash::make($data['password']);
        $user_id = User::create($data)->id;

        if($user_id){
            if(!CompanyUser::AssociateUserWithTheCompany(['company_id' => $company_id, 'user_id'=> $user_id])){
                return response()->json('Failed, Associate User With The Company', 422);
            }
            if(!ProfilesUser::AssociateUserWithProfile(['user_id'=> $user_id, 'profile_id' => $profile_id] , $is_request_your_demo)){
                return response()->json('Failed, Associate User With Profile', 422);
            }

            return response()->json(['message' => 'Success, Registered User', 'status' => 200], 200);
        }else{
            return response()->json(['message' =>'Failed, Registered User', 'status' => 422], 422);
        }
    }
    /**
     * Get User
     *
     * @param [type] $id
     * @return void
     */

    protected static function getUser($id = null){

        if(!Auth::check()){
            return response()->json(['message'=> 'User is not logged'],422);
        }
        $user = [];
        if($id){
            $user = User::find($id);
            if(!$user){
                return response()->json(['message' => 'User Not Found', 'status' => 404], 404);
            }
        }else{
            $user = auth()->user();
        }
        return $user->with(['company', 'companies','address', 'image'])->where('users.id', $user->id)->get();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    protected static function getAllUsers(){

        $users = Company::find(Auth::user()->company_id)->users()->get();
        if(!$users){
            return response()->json(['message' => 'Not Exist Users Relisted at the Company'], 422);
        }
        return $users;
    }
    /**
     * Undocumented function
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    protected static function updateUser($data, $id){
      
        $user = Company::find(Auth::user()->company_id)->users()->where('users.id',$id['id'])->get();
        
        if(sizeof($user) < 1){
            return response()->json(['message' => 'User Not Found', 'status' => 500], 500);
        }

        if($user[0]->update($data)){

            return response()->json(['message' => 'Success, Update User', 'status' => 200], 200);
        }else{

            return response()->json(['message' =>'Failed, Update User', 'status' => 422], 422);
        }
    }
    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    protected static function deleteUser($id){

        $user = Company::find(Auth::user()->company_id)->users()->where('users.id',$id)->get();
        
        if(sizeof($user) < 1){
            return response()->json(['message' => 'User Not Found', 'status' => 500], 500);
        }

        if($user[0]->delete()){

            return response()->json(['message' => 'Success, Delete User', 'status' => 200], 200);
        }else{

            return response()->json(['message' =>'Failed, Delete User', 'status' => 422], 422);
        }
    }
    protected static function changePassword($data, $id){
        
        
        $user = Company::find(Auth::user()->company_id)->users()->where('users.id',$id)->get();
        
        if(sizeof($user) < 1){
            return response()->json(['message' => 'User Not Found', 'status' => 500], 500);
        }

        $data['password'] = Hash::make($data['password']);
        
        if($user[0]->update($data)){

            return response()->json(['message' => 'Success, Change Password User', 'status' => 200], 200);
        }else{

            return response()->json(['message' =>'Failed, Change Password User', 'status' => 422], 422);
        }
    }
    protected static function existUser($user_id){

        if(User::where('id',$user_id)->exists()){
            return true;
        }else{
            return false;
        }
    }
    protected static function storageAddress($data, $user_id = null){
        
        $user = [];
        if($user_id != null){
            
            $user = User::find($user_id);

            if(!$user){
                return response()->json(['message' => 'User Not Found', 'status' => 404], 404);
            }

        }else{
            $user = Auth::user();
        }

        return Address::storageOrUpdateAddress($user, $data);
    }
    protected static function getAllAddress($user_id = null){
        $user = [];
        if($user_id != null){
            
            $user = User::find($user_id);

            if(!$user){
                return response()->json(['message' => 'User Not Found', 'status' => 404], 404);
            }

        }else{
            $user = Auth::user();
        }
        return Address::getAllAddress($user, $user_id);
    }
    protected static function getAddress($user_id = null, $id){
        $user = [];
        if($user_id != null){
            
            $user = User::find($user_id);

            if(!$user){
                return response()->json(['message' => 'User Not Found', 'status' => 404], 404);
            }

        }else{
            $user = Auth::user();
        }
        return Address::getAddress($user, $id);
    }
    protected static function updateAddress($data, $user_id = null, $id){
        $user = [];
        if($user_id != null){
            
            $user = User::find($user_id);
            
            if(!$user){
                return response()->json(['message' => 'User Not Found', 'status' => 404], 404);
            }
            
        }else{
            $user = Auth::user();
        }
        return Address::updateAddress($data, $user, $id);
    }
    protected static function deleteAddress($user_id = null, $id){
        $user = [];
        if($user_id != null){
            
            $user = User::find($user_id);

            if(!$user){
                return response()->json(['message' => 'User Not Found', 'status' => 404], 404);
            }

        }else{
            $user = Auth::user();
        }
        return Address::deleteAddress($user, $id);
    }
}