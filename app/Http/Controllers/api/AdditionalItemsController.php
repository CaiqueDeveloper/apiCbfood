<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\additionalItem\DeleteOrUpdateAdditionalItemRequest;
use App\Http\Requests\additionalItem\StorageAdditionalItemRequest;
use App\Http\Requests\additionalItem\UpdateAdditionalItemRequest;
use App\Models\AdditionalItems;
use Illuminate\Http\Request;

class AdditionalItemsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }

    protected function storageAdditionalItem(StorageAdditionalItemRequest $request){
        
        return AdditionalItems::storageAdditionalItem($request->all());
    }
    protected function getItemAdditional(DeleteOrUpdateAdditionalItemRequest $request){
        
       return AdditionalItems::getItemAdditional($request->only('id'));
    }
    protected function deleteItemAdditional(DeleteOrUpdateAdditionalItemRequest $request){

        return AdditionalItems::deleteItemAdditional($request->only('id'));
    }
    protected function updateItemAdditional(UpdateAdditionalItemRequest $request){
        
        return AdditionalItems::updateItemAdditional($request->except('id'), $request->only('id'));
    }
}
