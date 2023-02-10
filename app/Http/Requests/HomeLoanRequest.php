<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeLoanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'property_value'      => ['required', 'numeric', 'min:1000', 'max:50000'],
            'down_payment_amount' => ['required', 'numeric', 'min:1000', 'max:50000', 'lt:property_value']
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'down_payment_amount.lt' => 'The down payment amount must be less than Property Value.'
        ];
    }
    
}
