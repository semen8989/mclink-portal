<?php

namespace App\Http\Requests;

use App\Models\ServiceReport;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceReportRequest extends FormRequest
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
            'csrNo' => 'bail|required',
            'date' => 'bail|required|date',
            'newCustomer' => 'exclude_unless:isNewCustomer,true|bail|required',
            'customer' => 'exclude_unless:isNewCustomer,null|bail|required|exists:customers,id',
            'custEmail' => 'bail|nullable|email:filter|required_if:status,2',
            'address' => 'bail|required',
            'engineerId' => 'bail|required|exists:users,id',
            'ticketReference' => 'bail|nullable',
            'serviceRendered' => 'bail|required',
            'engineerRemark' => 'bail|nullable',
            'statusAfterService' => 'bail|nullable',
            'serviceStart' => 'bail|nullable|date|before:serviceEnd',
            'serviceEnd' => 'bail|nullable|date|after:serviceStart',
            'usedItCredit' => 'bail|nullable|multiple_of:0.5',
            'status' => ['bail', 'required', Rule::in(ServiceReport::STATUS)],
        ];
    }
}
