<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\address\StorageAddressRequest;
use App\Http\Requests\company\GetOrDeleteCompanyRequest;
use App\Http\Requests\company\StorageCompanyRequest;
use App\Http\Requests\company\UpdateCompanyRequest;
use App\Http\Requests\GetOrDeleteRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api', ['except' => ['storageCompany']]);
    }

    protected function storageCompany(StorageCompanyRequest $request){

        return Company::storage($request->all());
    }
    protected function getCompany(GetOrDeleteCompanyRequest $request){
        
        return Company::getCompany($request->only('id'));
    }
    protected function getAllCompaniesUser(){
        
        return Company::getAllCompaniesUser();
    }
    protected function updateCompany(UpdateCompanyRequest $request){
        
        return Company::updateCompany($request->except('id'), $request->only('id'));

    }
    protected function deleteCompany(GetOrDeleteCompanyRequest $request){
        
        return Company::deleteCompany($request->only('id'));
    }
    protected function storageAddress(StorageAddressRequest $request){

        return Company::storageAddress($request->except('company_id'), $request->company_id);
    }
    protected function getAllAddress(Request $request){

        return Company::getAllAddress($request->company_id);
    }
    protected function getAddress(GetOrDeleteRequest $request){

        return Company::getAddress($request->company_id, $request->id);
    }
    protected function updateAddress(StorageAddressRequest $request){

        return Company::updateAddress($request->except('company_id', 'id'),$request->company_id, $request->id);
    }
    protected function deleteAddress(GetOrDeleteRequest $request){

        return Company::deleteAddress($request->company_id, $request->id);
    }
}
