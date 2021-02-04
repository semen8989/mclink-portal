<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceFormRequest extends FormRequest
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
            'custEmail' => 'bail|nullable|email:filter',
            'address' => 'bail|required',
            'callStatus' => 'bail|nullable',
            'ticketReference' => 'bail|nullable',
            'serviceRendered' => 'bail|required',
            'engineerRemark' => 'bail|nullable',
            'statusAfterService' => 'bail|nullable',
            'serviceStart' => 'bail|nullable|date',
            'serviceEnd' => 'bail|nullable|date',
            'usedItCredit' => 'bail|nullable',

        ];
    }
}
