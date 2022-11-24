<?php

namespace App\Http\Controllers\api;

use App\Classes\ProductClass;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }

    protected function storageProduct(Request $request){
       
        return ProductClass::processingResponseProduct($request->all());
    }
    protected function getProducts(){

        return Product::getProductsCompany();
    }
}
