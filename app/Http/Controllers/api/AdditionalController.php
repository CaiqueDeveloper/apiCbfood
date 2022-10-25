<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdditionalController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:api');
    }

}
