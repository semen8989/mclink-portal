<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHolidayRequest extends FormRequest
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
            'event_name' => 'required|string|max:50',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'company_id.required' => 'The company field is required.'
        ];
    }
}
