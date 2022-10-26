<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\DeleteCategoryRequest;
use App\Http\Requests\category\StorageCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }

    protected function storage(StorageCategoryRequest $request){
       
        return Category::storage($request->all());
    }
    protected function updateCategory(UpdateCategoryRequest $request){
       
        return Category::updateCategory($request->except('id'), $request->only('id'));
    }
    protected function deleteCategory(DeleteCategoryRequest $request){
       
        return Category::deleteCategory($request->only('id'));
    }
    protected function getAllCategory(){
       
        return Category::getAllCategory();
    }
  
}
