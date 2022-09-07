<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowerRequest extends FormRequest
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
            'step' => 'required|integer',
            'monthly_sales'=>'required|numeric',
            'monthly_expenses'=>'required|numeric',
            'other_financing'=>'boolean',
            'other_financing_amount'=>'required_if:other_financing,true|numeric',
            'legal_business_name'=>'required|min:3',
            'business_physical_address' => 'required|min:3',
            'business_physical_city' => 'required|min:2',
            'business_physical_province' => 'required|max:2',
            'business_physical_postal' => 'required|min:2',
            'email' => 'required|email',
            'dob' => 'required|date',
        ];
    }
}
