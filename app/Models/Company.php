<?php

namespace App\Models;

use App\Http\Controllers\api\settingCompanyController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        $company_id = Company::create($data)->id;

        if(settingCompanyController::generateSlugCompanyName(['social_reason' => $data['social_reason'], 'company_id' =>$company_id])){
            
            return response()->json(['message' => 'Success, Registered Company', 'status' => 200], 200);
        }else{
            return response()->json(['message' => 'Failed, Registered Company', 'status' => 422], 422);
        }
    }
    protected static function getCompany($id){

        $company = Company::where($id)->with('settings','image','users','categories','additional.items','product', 'orders', 'address')->get();
        
        if(sizeof($company) <= 0){
            
            return response()->json(['message' => 'Error ! Company not found', 'status' => 404], 404);
        }

        return $company;
    }
    protected static function getAllCompaniesUser(){
         
       $company = Auth::user()->companies()->with('settings','image','users','categories','additional.items','product', 'orders', 'address')->get();
        
        if(sizeof($company) <= 0){
            
            return response()->json(['message' => 'Error ! Company not found', 'status' => 404], 404);
        }

        return $company;
    }

    protected static function updateCompany($data, $id){

        $company = Company::where($id)->get();

        if(sizeof($company) <= 0){
            
            return response()->json(['message' => 'Error ! Company not found', 'status' => 404], 404);
        }
        
        if($company[0]->update($data)){
            
            return response()->json(['message' => 'Success ! Company Update', 'status' => 200], 200);

        }else{
            
            return response()->json(['message' => 'Error ! Company Update', 'status' => 500], 500);
        }

    }

    protected static function deleteCompany($id){
        
        $company = Company::where($id)->get();

        if(sizeof($company) <= 0){
            
            return response()->json(['message' => 'Error ! Company not found', 'status' => 404], 404);
        }
        
        if($company[0]->delete()){
            
            return response()->json(['message' => 'Success ! Company Delete', 'status' => 200], 200);

        }else{
            
            return response()->json(['message' => 'Error ! Company Delete', 'status' => 500], 500);
        }
    }
    protected static function storageAddress($data, $company_id = null){
        
        $company = [];
        if($company_id != null){
            
            $company = Company::find($company_id);

            if(!$company){
                return response()->json(['message' => 'Company Not Found', 'status' => 404], 404);
            }

        }else{
            $company = Auth::user()->company;
        }
        
        return Address::storageOrUpdateAddress($company, $data);
    }
    protected static function getAllAddress($company_id = null){

        $company = [];
        if($company_id != null){
            
            $company = Company::find($company_id);

            if(!$company){
                return response()->json(['message' => 'Company Not Found', 'status' => 404], 404);
            }

        }else{
            $company = Auth::user()->company;
        }
        return Address::getAllAddress($company, $company_id);
    }

    protected static function getAddress($company_id = null, $id){

        $company = [];
        
        if($company_id != null){
            
            $company = Company::find($company_id);

            if(!$company){

                return response()->json(['message' => 'Company Not Found', 'status' => 404], 404);
            }

        }else{

            $company = Auth::user()->company;
        }
        return Address::getAddress($company, $id);
    }

    protected static function updateAddress($data, $company_id = null, $id){

        $company = [];

        if($company_id != null){
            
            $company = Company::find($company_id);

            if(!$company){

                return response()->json(['message' => 'Company Not Found', 'status' => 404], 404);
            }

        }else{
            $company = Auth::user()->company;
        }
        return Address::updateAddress($data, $company, $id);
    }
    protected static function deleteAddress($company_id = null, $id){

        $company = [];

        if($company_id != null){
            
            $company = Company::find($company_id);

            if(!$company){

                return response()->json(['message' => 'Company Not Found', 'status' => 404], 404);
            }

        }else{
            $company = Auth::user()->company;
        }
        return Address::deleteAddress($company, $id);
    }
}
