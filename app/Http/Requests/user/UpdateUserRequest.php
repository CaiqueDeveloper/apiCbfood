<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|email|min:10|max:150',
            'number_phone' => 'required|min:10|max:16',
            'number_phone_alternative' => 'min:10|max:16', 
            'id' => 'required', 
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'The Field ID required.',

            'name.required' => 'The Field name required.',
            'name.min' => 'Name field is less than (4) charset.',
            'name.max' => 'Name field is longer than (150) charset',
            
            'email.required' => 'The Field Email required.',
            'email.unique' => 'The Email provided already exists.',
            'email.email' => 'Please, enter a valid email.',
            'email.min' => 'Email field is less than (10) charset.',
            'email.max' => 'Email field is longer than (150) charset',
           
            'number_phone.required' => 'The Field phone number required.',
            'email.unique' => 'The Number Phone provided already exists.',
            'number_phone.min' => 'Number Phone field is less than (10) charset.',
            'number_phone.max' => 'Number Phone field is longer than (16) charset',
            
            'number_phone_alternative.min' => 'Number Phone Alternative field is less than (10) charset.',
            'number_phone_alternative.max' => 'Number Phone Alternative field is longer than (16) charset',
        ];
    }
}
