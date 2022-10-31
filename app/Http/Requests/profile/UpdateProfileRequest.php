<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|min:4|max:100',
            'label' => 'required|min:4|max:100',
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'The Field ID required.',
            'id.regex' => 'The Reported Value is not of numeric type',
            
            'name.required' => 'The Field Name required.',
            'name.min' => 'Name field is less than (4) charset.',
            'name.max' => 'Name field is longer than (150) charset',
            
            
            'label.required' => 'The Field Label required.',
            'label.min' => 'Label field is less than (4) charset.',
            'label.max' => 'Label field is longer than (150) charset',

        ];
    }
}
