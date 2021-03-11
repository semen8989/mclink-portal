<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfficeShiftRequest extends FormRequest
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
            'shift_name' => 'required|max:50',
            'monday_in_time' => 'required_with:monday_out_time',
            'monday_out_time' => 'required_with:monday_in_time',
            'tuesday_in_time' => 'required_with:tuesday_out_time',
            'tuesday_out_time' => 'required_with:tuesday_in_time',
            'wednesday_in_time' => 'required_with:wednesday_out_time',
            'wednesday_out_time' => 'required_with:wednesday_in_time',
            'thursday_in_time' => 'required_with:thursday_out_time',
            'thursday_out_time' => 'required_with:thursday_in_time',
            'friday_in_time' => 'required_with:friday_out_time',
            'friday_out_time' => 'required_with:friday_in_time',
            'saturday_in_time' => 'required_with:saturday_out_time',
            'saturday_out_time' => 'required_with:saturday_in_time',
            'sunday_in_time' => 'required_with:sunday_out_time',
            'sunday_out_time' => 'required_with:sunday_in_time'
        ];
    }

}
