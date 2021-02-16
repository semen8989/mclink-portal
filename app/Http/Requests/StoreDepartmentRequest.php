<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
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
            'department_name' => 'required|string|max:50',
            'company_id' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'company_id.required' => 'The company field is required.',
            'user_id.required' => 'The department head field is required.'
        ];
    }
}
