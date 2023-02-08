<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalItems extends Model
{
    use HasFactory;
    protected $fillable = ['additional_id','name', 'description', 'price', 'code', 'status'];

    protected static function storageAdditionalItem($data){
        
        $data['price'] = str_replace(',','.',str_replace('R$', '', $data['price']));
        $additionalItem = AdditionalItems::updateOrCreate($data, $data);
        if($additionalItem){
            return response()->json(['message' => 'Success ! Additional Item Registered', 'data' => $additionalItem, 'status' => 200], 200);
        }else{
            return response()->json(['message' => 'Error Registered Additional Item', 'status' => 422], 422);
        }
    }
    protected static function getItemAdditional($id){

        $data = AdditionalItems::where($id)->get();
        
        if(sizeof($data) <= 0){
            
            return response()->json(['message' => 'Additional Item Not Found', 'status' => 404], 404);
        }

        return $data;
    }
    protected static function updateItemAdditional($data, $id){
        $data['price'] = str_replace(',','.',str_replace('R$', '', $data['price']));
        $dataAux = AdditionalItems::where($id)->get();
        
        if(sizeof($dataAux) <= 0){
            
            return response()->json(['message' => 'Additional Item Not Found', 'status' => 404], 404);
        }
        $dataAux = $dataAux[0]->update($data);
        if( $dataAux){
            $data = AdditionalItems::where($id)->get();
            return response()->json(['message' => 'Success, Update Additional Item', 'data' => $data, 'status' => 200], 200);
        }else{

            return response()->json(['message' =>'Failed, Update Additional Item', 'status' => 422], 422);
        }
    }
    protected static function deleteItemAdditional($id){

        $data = AdditionalItems::where($id)->get();
        
        if(sizeof($data) <= 0){
            
            return response()->json(['message' => 'Additional Item Not Found', 'status' => 404], 404);
        }

        if($data[0]->delete()){
            
            return response()->json(['message' => 'Success, Delete Additional Item', 'status' => 200], 200);
        }else{

            return response()->json(['message' =>'Failed, Delete Additional Item', 'status' => 422], 422);
        }

    }

}
