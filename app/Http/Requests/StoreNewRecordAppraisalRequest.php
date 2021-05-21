<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewRecordAppraisalRequest extends FormRequest
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
            'employee_id' => 'bail|required|exists:users,id',
            'review_period_from' => 'bail|required|date|before:review_period_to',
            'review_period_to' => 'bail|required|date|after:review_period_from',
            'purpose' => 'bail|required|in:1,2',
            'pf_score' => 'bail|required|numeric|between:0,5',
            'qow_score' => 'bail|required|numeric|between:0,5',
            'wh_score' => 'bail|required|numeric|between:0,5',
            'jk_score' => 'bail|required|numeric|between:0,5',
            'bro_score' => 'bail|required|numeric|between:0,5',
            'pf_level' => 'bail|required|in:1,5',
            'qow_level' => 'bail|required|in:1,5',
            'wh_level' => 'bail|required|in:1,5',
            'jk_level' => 'bail|required|in:1,5',
            'bro_level' => 'bail|required|in:1,5',
            'pf_comment' => 'bail|required',
            'qow_comment' => 'bail|required',
            'wh_comment' => 'bail|required',
            'jk_comment' => 'bail|required',
            'bro_comment' => 'bail|required',
            'overall_progress' => 'bail|required|in:1,2,3',
            'progress_comment' => 'bail|required',
            'recommendation' => 'bail|required|in:1,2',
            'review_date' => 'bail|required|date',
            'final_comment' => 'bail|required',        
        ];
    }
}
