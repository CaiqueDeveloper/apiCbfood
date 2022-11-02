<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\SettingCompany;
use Illuminate\Http\Request;

class settingCompanyController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }
    public function generateSlugCompanyName($response){
        
        $data = [];
        $data['company_id'] = $response['company_id'];
        $data['slug_url'] = Str::slug($response['social_reason']);
       
        return SettingCompany::store($data);
    }
}
