<?php
namespace App\Classes;

use App\Models\Product;
use App\Models\VariationProduct;
use Illuminate\Support\Facades\Auth;

Class ProductClass{

    public function processingResponseProduct($data){
        
        $product = [];
        
        $product['name'] = $data['name'];
        $product['category_id'] = $data['category_id'];
        $product['description'] = $data['description'];
        $product['price'] = str_replace(',','.',str_replace('R$', '', $data['price']));
        $product['canPrice'] = isset($data['canPrice']) ? 1 : 0;
        $product['hasVariations'] = isset($data['hasVariations']) ? 1 : 0;
        $product['hasAdditionals'] = isset($data['hasAdditionals']) ? 1 : 0;
        
        $variations = isset($data['variationName']) ? self::processingVariationProduct($data['variationName'], $data['variationType'], $data['variationPrice']) : [];
        $additionals = isset($data['additionals']) ? self::processingAdditionalsProduct($data['additionals']) : [];
        $images = isset($data['images']) ? self::processingImagesProduct($data['images']) : [];
        
        $company = Auth::user()->company;
        //dd($product);
        return Product::storageProduct($company, $product, $variations, $additionals, $images);
       
        
    }
    public function processingVariationProduct($variationName, $variationType, $variationPrice){

        $variationProduct = [];

        if(isset($variationName)){
            foreach($variationName as $key => $name){
                $variationProduct[$key]['variationName'] = $name;
            }
            foreach($variationType as $key => $type){
                $variationProduct[$key]['variationType'] = $type;
            }
             foreach($variationPrice as $key => $price){
                $variationProduct[$key]['variationPrice'] = str_replace(',','.',str_replace('R$', '', $price));
            }
        }
        
        return $variationProduct;
    }
    public function processingAdditionalsProduct($additionals){

        $additionalsProduct = [];

        if(isset($additionals)){
            foreach($additionals as $key => $additional){
                $additionalsProduct[$key]['additional_id'] = $additional;
            }   
        }
        
        return $additionalsProduct;
    }
    public function processingImagesProduct($images){

        $imagesProduct = [];

        if(isset($images)){
            foreach($images as $key => $image){
                $imagesProduct[$key]['path'] = $image->store('images/products');
            }   
        }
        
        return $imagesProduct;
    }
}