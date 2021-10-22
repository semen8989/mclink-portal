<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesLeadRequest extends FormRequest
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
            'company_name' => 'required',
            'tel_num' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'mclink_base_reason' => 'required',
            'sales_manager' => 'required',
            'approve_by' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tel_num.required' => 'The telephone number field is required.'
        ];
    }
}
