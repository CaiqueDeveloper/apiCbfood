<?php

namespace App\Http\Requests\permission;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
            'name' => 'required|min:4|max:150',
            'label' => 'required|min:4|max:150',

        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'The Field ID required.',
            'id.regex' => 'The Reported Value is not of numeric type',
            
            'name.required' => 'The Field Social Reason required.',
            'name.min' => 'Social Reason field is less than (4) charset.',
            'name.max' => 'Social Reason field is longer than (150) charset',
            
            'label.unique' => 'There is already a company with an informed CNPJ.',
            'label.min' => 'CNPJ field is less than (10) charset.',
            'label.max' => 'CNPJ field is longer than (18) charset',
           
            
        ];
    }
}
