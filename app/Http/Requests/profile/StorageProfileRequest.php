<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class StorageProfileRequest extends FormRequest
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
            'name' => 'required|min:4|max:100|unique:profiles',
            'label' => 'required|min:4|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'There is already a Profile with an informed Name.',
            'name.required' => 'The Field Name required.',
            'name.min' => 'Name field is less than (4) charset.',
            'name.max' => 'Name field is longer than (150) charset',
            
            'label.unique' => 'There is already a Profile with an informed Label.',
            'label.required' => 'The Field Label required.',
            'label.min' => 'Label field is less than (4) charset.',
            'label.max' => 'Label field is longer than (150) charset',

        ];
    }
}
