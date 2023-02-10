<?php

namespace App\Http\Requests;

use App\Models\Adviser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param Validator $validator
     *
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            if ($this->userExistInDatabase() && empty($validator->errors()->all())) {
                $validator->errors()->add('wrongUser', 'Invalid email or password!');
            }
        });
    }

    public function userExistInDatabase()
    {
        return !auth()->attempt(request()->only(['email', 'password']));
    }
}
