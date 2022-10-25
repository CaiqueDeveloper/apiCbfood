<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api');
    }
   
}
