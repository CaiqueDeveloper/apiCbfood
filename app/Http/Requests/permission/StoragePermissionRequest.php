<?php

namespace App\Http\Requests\permission;

use Illuminate\Foundation\Http\FormRequest;

class StoragePermissionRequest extends FormRequest
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
            'name' => 'required|min:4|max:150',
            'label' => 'required|min:4|max:150',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The Field Social Reason required.',
            'name.min' => 'Social Reason field is less than (4) charset.',
            'name.max' => 'Social Reason field is longer than (150) charset',
            
            'label.unique' => 'There is already a company with an informed CNPJ.',
            'label.min' => 'CNPJ field is less than (10) charset.',
            'label.max' => 'CNPJ field is longer than (18) charset',
           
            
        ];
    }
}
