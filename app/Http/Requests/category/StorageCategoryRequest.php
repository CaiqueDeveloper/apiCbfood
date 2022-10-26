<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class StorageCategoryRequest extends FormRequest
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
            'name' => 'required|min:4|max:100|'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please with the name field.',
            'name.min' => 'The Name field cannot be less than (4) charset.',
            'name.max' => 'The Name field cannot be longer than (100) charset.',
        ];
    }
}
