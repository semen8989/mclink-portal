<?php

namespace App\Http\Requests;

use App\Models\KpiObjective;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreKpiObjectiveRequest extends FormRequest
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
            'objective_kpi' => 'bail|required',
            'objective_quarter' => ['bail', 'required', Rule::in(array_keys(KpiObjective::QUARTER))],
            'objective_year' => 'bail|required|date_format:Y|before_or_equal:+5 year|after_or_equal:-6 year',
            'target_date' => 'bail|required|date_format:d/m/Y|after_or_equal:' . date('d/m/Y'),
        ];
    }
}
