<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name' => 'required',
            'employee_id' => 'required',
            'joining_date' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'company_id' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
            'contact_number' => 'required',
            'shift_id' => 'required',
            'email' => 'required',
            'role' => 'required'
        ];
    }
}
