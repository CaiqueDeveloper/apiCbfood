<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\company\GetOrDeleteCompanyRequest;
use App\Http\Requests\company\StorageCompanyRequest;
use App\Http\Requests\company\UpdateCompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
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
   
}
