<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCompanyRequest extends FormRequest
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
            'company_name' => 'required|string|max:50',
            'company_type' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email:filter', //for unique value = request()->route('user')->id()
            'website' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'logo' => 'image|nullable|max:1999'
        ];
    }
}
