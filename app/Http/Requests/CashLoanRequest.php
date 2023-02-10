<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashLoanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'loan_amount' => ['required', 'numeric', 'min:1000', 'max:50000']
        ];
    }
}
