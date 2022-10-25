<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    use HasFactory;
    protected  $table = 'company_user';
    public $timestamps = false;
    protected $fillable = ['user_id', 'company_id'];

    protected static function AssociateUserWithTheCompany($data){
        
        return CompanyUser::updateOrCreate($data,$data);
    }
}
