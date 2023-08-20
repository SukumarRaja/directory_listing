<?php

namespace App\Http\Traits\Auth;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    protected function passwordRules(): array
    {
        return [
            'required',
            Password::min(8),
        ];
    }
}
