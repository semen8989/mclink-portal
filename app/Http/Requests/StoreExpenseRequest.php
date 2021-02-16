<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            'expense_type_id' => 'required',
            'purchase_date' => 'required',
            'amount' => 'required',
            'company_id' => 'required',
            'user_id' => 'required',
            'bill_copy' => 'image|nullable|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'expense_type_id.required' => 'The expense type field is required.',
            'company_id.required' => 'The company field is required.',
            'user_id.required' => 'The employee field is required.'
        ];
    }
}
