<?php

namespace App\Http\Requests\moduleProfiles;

use Illuminate\Foundation\Http\FormRequest;

class StorageModuleProfileRequest extends FormRequest
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
            'module_id' => 'required|regex:/(^[0-9])/u',
            'profile_id' => 'required|regex:/(^[0-9])/u',
        ];
    }
    public function messages()
    {
        return [
            'module_id.required' => 'The Field ID required.',
            'module_id.regex' => 'The Reported Value is not of numeric type',
            
            'profile_id.required' => 'The Field ID required.',
            'profile_id.regex' => 'The Reported Value is not of numeric type',
        ];
    }
}
