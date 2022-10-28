<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required|min:6|max:12',
            'password_confirmed' => 'required|same:password|min:6|max:12'
        ];
    }
    public function messages(){
        return [
            'id.required' => 'The Field ID required.',
            'id.regex' => 'The Reported Value is not of numeric type',

            'password.required' => 'The Field password required.',
            'password.min' => 'Password field is less than (6) charset.',
            'password.max' => 'Password field is longer than (12) charset',
            
            'password_confirmed.required' => 'The Field password confirmed required.',
            'password_confirmed.same' => 'The password confirmation field does not match the password entered.',
            'password_confirmed.min' => 'Password Confirmed field is less than (6) charset.',
            'password_confirmed.max' => 'Password Confirmed field is longer than (12) charset',
        ];
    }
}
