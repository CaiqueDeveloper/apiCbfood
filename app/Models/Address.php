<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['states', 'zipe_code', 'city', 'distric', 'road', 'number', 'complement'];
    protected $table = 'address';

    protected static function storageOrUpdateAddress($model, $data){

        if($model->address()->updateOrCreate($data, $data)){

            return response()->json(['message' => 'Success, Address given/and updated', 'status' => 200], 200);
        }else{
            
            return response()->json(['message' => 'Error, Address given/and updated', 'status' => 500], 500);
        }
    }
    protected static function getAllAddress($model, $user_id){

       if( sizeof($model->address) < 1 ){

            return response()->json(['message' => 'Oops! No address has been entered', 'status' => 404], 404);
       }

       return $model->address;
    }
    protected static function getAddress($model, $id){
       
        $address = $model->address()->where('id', $id)->get();
       
        if( sizeof($address) < 1 ){

            return response()->json(['message' => 'Oops! No address has been entered', 'status' => 404], 404);
        }

       return $address;
    }
    protected static function updateAddress($data, $model, $id){
        
        $address = $model->address()->where('id', $id)->get();
        
        if( sizeof($address) < 1 ){
            
            return response()->json(['message' => 'Oops! No address has been entered', 'status' => 404], 404);
        }
        
        if($address[0]->update($data)){
            
            return response()->json(['message' => 'Success, Address updated', 'status' => 200], 200);
        }else{
            
            return response()->json(['message' => 'Error, Address updated', 'status' => 500], 500);
        }
    }
    protected static function deleteAddress($model, $id){
       
        $address = $model->address()->where('id', $id)->get();
       
        if( sizeof($address) < 1 ){

            return response()->json(['message' => 'Oops! No address has been entered', 'status' => 404], 404);
        }

        if($address[0]->delete()){
            
            return response()->json(['message' => 'Success, Address Deleted', 'status' => 200], 200);
        }else{
            
            return response()->json(['message' => 'Error, Address Deleted', 'status' => 500], 500);
        }
    }
}
