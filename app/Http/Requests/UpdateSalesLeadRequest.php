<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesLeadRequest extends FormRequest
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
            'contact_person' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tel_num.required' => 'The telephone number field is required.'
        ];
    }
}
