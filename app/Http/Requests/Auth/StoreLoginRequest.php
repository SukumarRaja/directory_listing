<?php

namespace App\Http\Requests\Auth;

use App\Http\Traits\Auth\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => $this->passwordRules(),
            'remember_me' => ['nullable', 'in:on'],
        ];
    }
}
