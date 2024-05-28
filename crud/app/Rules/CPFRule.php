<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CPFRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = preg_replace('/[^0-9]/', '', $value);

        if (strlen($value) === 11) {
            // CPF validation logic
        } elseif (strlen($value) === 14) {
            // CNPJ validation logic
        } else {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Não é um CPF válido!.';
    }
}