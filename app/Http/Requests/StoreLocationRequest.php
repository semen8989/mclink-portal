<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
            'company_id' => 'required',
            'location_name' => 'required|string|max:50',
            'email' => 'nullable|email:filter',
            'phone' => 'nullable',
            'fax_num' => 'nullable',
            'location_head' => 'required',
            'address_1' => 'nullable',
            'address_2' => 'nullable',
            'city' => 'required',
            'state' => 'nullable',
            'zip_code' => 'nullable',
            'country' => 'required',
        ];
    }
}
