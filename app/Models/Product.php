<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description', 'price', 'canPrice', 'hasVariations','status'];

    public function prduct_morph(){
        return $this->morphTo();
    }
    public function image(){   
        return $this->morphMany(Images::class, 'imagebleMorph');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function promotion(){
        return $this->hasMany(Promotion::class);
    }
    public function images(){
        return $this->hasMany(Images::class,'imagebleMorph_id');
    }
    public function additionalsProduct(){
        return $this->hasMany(AdditionalProduct::class, 'product_id');
    }
    public function variations(){
        return $this->hasMany(VariationProduct::class, 'product_id');
    }
    protected static function storageProduct($company, $product, $variations, $additionals, $images){
        
        $error = [];
        
        $id = $company->product()->updateOrCreate($product, $product)->id;
        $productItem = Product::find($id);

        if (isset($variations)) {
            if (!VariationProduct::storageVariation($productItem, $variations)) {
                $error['variationProduct'] =  'Error! Storage Variation Product';
            }
        }

        if (isset($additionals)) {
            if (!AdditionalProduct::storageAdditionals($productItem, $additionals)) {
                $error['additionalsProduct'] =  'Error! Storage Additionals Product';
            }
        }
        
        if (isset($images)) {
            if (!images::storageImages($productItem, $images)) {
                $error['additionalsProduct'] =  'Error! Storage Additionals Product';
            }
        }

        if (sizeof($error) > 0 && is_int($id)) {
            return response()->json(['data' => ['success' => false, 'error' => $error, 'status' => 500]], 500);
        } else {
            return response()->json(['data' => ['success' => true, 'error' => $error, 'status' => 200]], 200);
        }
        
    }

    protected static function getProductsCompany($company_id = null){
        
        $company = [];
        
        if($company_id != null){
           $company = Company::find($company_id)->with('product.images', 'product.variations','product.additionalsProduct.additionals.items' ,'product.category')->get();
        }else{
            $company = auth()->user()->company()->with('product.images', 'product.variations','product.additionalsProduct.additionals.items' ,'product.category')->get();
        }

        if(sizeof($company[0]->product) > 0){
            return response()->json(['data' => ['success' => true, 'error' => [], 'status' => 200, 'products' => $company[0]->product]], 200,);
        }else{
            return response()->json(['data' => ['success' => false, 'error' => 'Products no registered', 'status' => 404, 'products' => []]], 404);
        }
    }   
}
