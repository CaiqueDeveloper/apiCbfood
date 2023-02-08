<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'categories';

    public function category_morph(){ 

        return $this->morphTo();
    }
    /**
     * Undocumented function
     *
     * @param [type] $data
     * @return void
     */
    protected static function storage($data){
        $company = Company::find(Auth::user()->company_id);
        $category = $company->category()->create($data);
        if($category){
            return response()->json(['message'=> 'Success, Registered Category', 'status' => 200,  'data' => $category], 200);
        }else{
            return response()->json(['message'=> 'Failed, Registered Category', 'status' => 422], 422);
        }
    }
    protected static function getCategory($id){
        
        $category = Company::find(Auth::user()->company_id)->category()->where('id',$id)
        ->select('categories.id','categories.category_morph_id as company_id', 'categories.name','categories.created_at')
        ->get();
        
        if(sizeof($category) <= 0){
            return response()->json(['message'=> 'We were unable to locate the specified category.' , 'status' => 500], 500);
        }

        return $category;
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    protected static function getAllCategory(){

        $category = Company::find(Auth::user()->company_id)->category()
        ->select('categories.id', 'categories.category_morph_id as company_id', 'categories.name', 'categories.created_at')
        ->get();
        
        if(sizeof($category) <= 0){
            return response()->json(['message'=> 'This company has not yet registered in a category.', 'data' => []  , 'status' => 200], 200);
        }

        return response()->json($category->toArray(), 200);
    }
    /**
     * Undocumented function
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    protected static function updateCategory($data, $id){
        $category = Company::find(Auth::user()->company_id)->category()->where($id)->get();
        
        if(sizeof($category) <= 0){
            return response()->json(['message'=> 'We were unable to locate the specified category.' , 'status' => 500], 500);
        }
        $category = $category[0]->update($data);
        if($category){
            return response()->json(['message'=> 'Success, Update Category','status' => 200 ,'data' => $category], 200);
        }else{
            return response()->json(['message'=> 'Failed, Update Category' , 'status' => 422], 422);
        }
    }
    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    protected  function deleteCategory($id){

        $category =  Company::find(Auth::user()->company_id)->category()->where($id)->get();
        
        if(sizeof($category) <= 0){
            return response()->json(['message'=> 'We were unable to locate the specified category.' , 'status' => 500], 500);
        }

        if($category[0]->delete()){
            return response()->json(['message'=> 'Success, Delete Category','status' => 200], 200);
        }else{
            return response()->json(['message'=> 'Failed, Delete Category' , 'status' => 422], 422);
        }
    }
}
