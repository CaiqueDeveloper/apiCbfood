<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['social_reason','email','cnpj', 'number_phone', 'state_registration','foundation_date',];

    protected static function storage($data){

        $data['number_phone'] = str_replace('-','',filter_var($data['number_phone'], FILTER_SANITIZE_NUMBER_INT));
        $data['cnpj'] = str_replace('-','',filter_var($data['cnpj'], FILTER_SANITIZE_NUMBER_INT));

        if(Company::create($data)){
            return response()->json('Success, Registered Company', 200);
        }else{
            return response()->json('Failed, Registered Company', 422);
        }
    }

    
}
