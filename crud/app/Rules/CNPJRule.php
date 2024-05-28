<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CNPJRule implements Rule
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
        $cnpj = preg_replace('/[^0-9]/', '', $value);
        if (strlen($cnpj) != 14) {
            return false;
        }
        for ($t = 1; $t < 13; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cnpj[$c] * (($t + 1) - $c);
            }
            $d = ((11 - ($d % 11)) % 11);
            if ($cnpj[$c] != $d && $d != 10) {
                return false;
            }
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
        return 'Não é um CNPJ válido.';
    }
}