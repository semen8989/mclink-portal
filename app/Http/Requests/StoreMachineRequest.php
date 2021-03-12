<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMachineRequest extends FormRequest
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
            'model' => 'required',
            'qty' => 'required',
            'system' => 'required',
            'cassette_no' => 'required',
            'contract_period' => 'required',
            'special_requirement' => 'required',
            'company_name' => 'required',
            'billing_address' => 'required',
            'office_contact_no' => 'required',
            'installation_address' => 'required',
            'person_in_charge' => 'required',
            'contact_no' => 'required',
            'installation_date' => 'required',
            'technician_id' => 'required'
        ];
    }
}
