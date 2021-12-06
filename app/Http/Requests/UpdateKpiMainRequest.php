<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKpiMainRequest extends FormRequest
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
            'main_kpi' => 'bail|required',
            'feedback' => 'bail|nullable',
            'q1' => 'bail|nullable',
            'q2' => 'bail|nullable',
            'q3' => 'bail|nullable',
            'q4' => 'bail|nullable',
            'status' => 'bail|required|in:0,1',
            'kpi_ratings.month' => 'bail|sometimes|required',
            'kpi_ratings.rating' => 'bail|sometimes|required',
            'kpi_ratings.manager_comment' => 'bail|sometimes|required',
        ];
    }
}
