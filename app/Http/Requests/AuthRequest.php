<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ];
    }
    public function messages()
    {
        return [
            'email.email' => 'The informed e-mail is not valid.',
            'email.required' => 'The e-mail field is required.',
            'password.required' => 'The password field is required.',
            'password.min' => 'Warning the password is not valid, at password need at min 8 charset.',
            'password.max' => 'Warning the password is not valid, at password need at max 12 charset.'
        ];
    }
}
