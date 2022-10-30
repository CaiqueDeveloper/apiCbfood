<?php

namespace App\Http\Requests\additionalItem;

use Illuminate\Foundation\Http\FormRequest;

class DeleteOrUpdateAdditionalItemRequest extends FormRequest
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
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'Please with the ID field.',
            'id.regex' => 'The Reported Value is not of numeric type', 

        ];
    }
}
