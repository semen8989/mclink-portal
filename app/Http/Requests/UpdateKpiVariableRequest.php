<?php

namespace App\Http\Requests;

use App\Models\KpiVariable;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKpiVariableRequest extends FormRequest
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
            'variable_kpi' => 'bail|required',
            'result' => 'bail|nullable',
            'feedback' => 'bail|nullable',
            'target_date' => 'bail|required|date_format:d/m/Y',
            'status' => ['bail', 'required', Rule::in(KpiVariable::COMPLETED_STATUS)],
            'kpi_ratings.month' => 'bail|sometimes|required',
            'kpi_ratings.rating' => 'bail|sometimes|required',
            'kpi_ratings.manager_comment' => 'bail|sometimes|required',
        ];
    }
}
