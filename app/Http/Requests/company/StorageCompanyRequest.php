<?php

namespace App\Http\Requests\company;

use Illuminate\Foundation\Http\FormRequest;

class StorageCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'social_reason' => 'required|min:4|max:150',
            'cpj' => 'unique:companies|min:10|max:18',
            'number_phone' => 'required|unique:companies|min:10|max:16',
            'state_registration' => 'max:2|string',
            'foundation_date' => 'date',  
        ];
    }
    public function messages()
    {
        return [
            'social_reason.required' => 'The Field Social Reason required.',
            'social_reason.min' => 'Social Reason field is less than (4) charset.',
            'social_reason.max' => 'Social Reason field is longer than (150) charset',
            
            'cpj.unique' => 'There is already a company with an informed CNPJ.',
            'cpj.min' => 'CNPJ field is less than (10) charset.',
            'cpj.max' => 'CNPJ field is longer than (18) charset',
           
            
            'state_registration.string' => 'State Registration field is not string',
            'state_registration.max' => 'State Registration is longer than (2) charset',
            
            'foundation_date.date' => 'The date entered is not valid.',
            
        ];
    }
}
