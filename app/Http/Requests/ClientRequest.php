<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
class ClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'first_name'   => ['required'],
            'last_name'    => ['required'],
            'phone_number' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8', 'required_without:email']
        ];

        return match (request()->method()) {
            'POST' => array_merge(
                $rules,
                ['email'        => ['nullable', 'email', 'unique:clients,email', 'required_without:phone_number']],
            ),
            'PATCH' => array_merge(
                $rules,
                ['email'        => ['nullable', 'email', Rule::unique('clients')->ignore($this->route()->parameter('client')->id), 'required_without:phone_number']],
            )
        };
    }
}
