<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['social_reason','email','cnpj', 'number_phone', 'state_registration','foundation_date',];

    public function address(){

        return $this->morphMany(Address::class, 'addres_morph');
    }
    public function image(){
        
        return $this->morphMany(Images::class, 'imagebleMorph');
    }
    public function category(){
        
        return $this->morphMany(Category::class, 'category_morph');
    }
    public function additional(){
        
        return $this->morphMany(additional::class, 'additional_morph');
    }
    public function product(){
        
        return $this->morphMany(Product::class, 'product_morph');
    }
    public function settings(){
        
        return $this->hasMany(SettingCompany::class, 'company_id');
    }
    public function orders(){
        return $this->hasMany(Order::class, 'company_id');
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function user(){
        return $this->hasMany(User::class, 'company_id');
    }
    public function categories(){

        return $this->hasMany(Category::class, 'category_morph_id', 'id');
    }


    protected static function storage($data){

        $data['number_phone'] = str_replace('-','',filter_var($data['number_phone'], FILTER_SANITIZE_NUMBER_INT));
        $data['cnpj'] = str_replace('-','',filter_var($data['cnpj'], FILTER_SANITIZE_NUMBER_INT));

        if(Company::create($data)){
            return response()->json(['message' => 'Success, Registered Company', 'status' => 200], 200);
        }else{
            return response()->json(['message' => 'Failed, Registered Company', 'status' => 422], 422);
        }
    }

    
}
