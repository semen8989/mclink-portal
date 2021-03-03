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
            'user_id' => 'required',
            'email' => 'nullable|email:filter',
            'city' => 'required',
            'country' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'user_id.required' => 'The location head field is required',
        ];
    }
}
