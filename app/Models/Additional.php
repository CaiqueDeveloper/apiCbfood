<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Additional extends Model
{
    use HasFactory;
    protected $fillable  = ['name'];

    public function aadditional_morph(){
        
        return $this->morphTo();
    }
    public function items(){

        return $this->hasMany(AdditionalItems::class);
    }
    protected static function storageAdditional($data){

        $storage = Company::find(Auth::user()->company_id)->additional()->create($data);

        if($storage){
            return response()->json(['message' => 'Success, Registered Additional', 'status' => 200], 200);
        }else{

            return response()->json(['message' =>'Failed, Registered Additional', 'status' => 422], 422);
        }
    }
    protected static function getAdditional($id){

        $company = Company::find(Auth::user()->company_id);
        $additional = $company->additional()->where('id', $id)->with('items')->get();

        if(sizeof($additional) <= 0){
            
            return response()->json(['message' => 'Additional Not Found', 'status' => 200], 200);
        }

        return $additional;
    }
    protected static function getAllAdditionals(){

        $company = Company::find(Auth::user()->company_id);
        $additional = $company->additional()->with('items')->get();

        if(sizeof($additional) <= 0){
            
            return response()->json(['message' => 'This company has not yet registered the additional', 'status' => 200], 200);
        }

        return $additional;
    }
    protected static function updateAdditional($data , $id){
        $company = Company::find(Auth::user()->company_id);
        $additional = $company->additional()->where('id', $id)->get();
        
        if(sizeof($additional) <= 0){
            
            return response()->json(['message' => 'Additional Not Found', 'status' => 200], 200);
        }

        if($additional[0]->update($data)){
            return response()->json(['message' => 'Success, Update Additional', 'status' => 200], 200);
        }else{

            return response()->json(['message' =>'Failed, Update Additional', 'status' => 422], 422);
        }
    }

    protected static function deleteAdditional($id){
        $company = Company::find(Auth::user()->company_id);
        $additional = $company->additional()->where('id', $id)->get();
        
        if(sizeof($additional) <= 0){
            
            return response()->json(['message' => 'Additional Not Found', 'status' => 404], 404);
        }

        if($additional[0]->delete()){
            return response()->json(['message' => 'Success, Delete Additional', 'status' => 200], 200);
        }else{

            return response()->json(['message' =>'Failed, Delete Additional', 'status' => 422], 422);
        }
    }
    
}
