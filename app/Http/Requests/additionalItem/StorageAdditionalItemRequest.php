<?php

namespace App\Http\Requests\additionalItem;

use Illuminate\Foundation\Http\FormRequest;

class StorageAdditionalItemRequest extends FormRequest
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
            'additional_id' => 'required|regex:/(^[0-9])/u',
            'name' => 'required|min:3|max:100',
            'price' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'Please with the ID field.',
            'id.regex' => 'The Reported Value is not of numeric type',

            'name.required' => 'Please with the name field.',
            'name.min' => 'The Name field cannot be less than (3) charset.',
            'name.max' => 'The Name field cannot be longer than (100) charset.',
            
            'price.required' => 'Please with the price field.',
            'description.required' => 'Please with the description field.',
            
            
            

        ];
    }
}
