<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
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
     * Get User
     *
     * @param [type] $id
     * @return void
     */

    protected static function getUser($id = null){
        
        if(!Auth::check()){
            return response()->json(['message'=> 'User is not logged'],422);
        }
        if($id){
            $user = User::find($id);
        }
        $user = Auth::user();

        return $user->with('company', 'companies','address', 'image')->get();
    }
}
