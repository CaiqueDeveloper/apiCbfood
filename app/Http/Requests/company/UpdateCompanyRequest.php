<?php

namespace App\Http\Requests\company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|regex:/(^[0-9])/u',
            'social_reason' => 'required|min:4|max:150',
            'cpj' => 'unique:companies|min:10|max:18',
            'number_phone' => 'min:10|max:16',
            'state_registration' => 'max:2|string',
            'foundation_date' => 'date',  
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'The Field ID required.',
            'id.regex' => 'The Reported Value is not of numeric type',
            
            'social_reason.required' => 'The Field Social Reason required.',
            'social_reason.min' => 'Social Reason field is less than (4) charset.',
            'social_reason.max' => 'Social Reason field is longer than (150) charset',
            
            'cpj.unique' => 'There is already a company with an informed CNPJ.',
            'cpj.min' => 'CNPJ field is less than (10) charset.',
            'cpj.max' => 'CNPJ field is longer than (18) charset',
           
            'email.unique' => 'The Email provided already exists.',
            'email.email' => 'Please, enter a valid email.',

            'state_registration.string' => 'State Registration field is not string',
            'state_registration.max' => 'State Registration is longer than (2) charset',
            
            'foundation_date.date' => 'The date entered is not valid.',
            
        ];
    }
}
