<?php

namespace App\Http\Requests;

use App\Models\KpiVariable;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreKpiVariableRequest extends FormRequest
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
            'variable_quarter' => ['bail', 'required', Rule::in(KpiVariable::QUARTER)],
            'variable_year' => 'bail|required|date_format:Y|before_or_equal:+5 year|after_or_equal:-6 year',
            'target_date' => 'bail|required|date_format:d/m/Y|after_or_equal:' . date('d/m/Y'),
        ];
    }
}
