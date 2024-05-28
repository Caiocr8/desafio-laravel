<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CPFRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Remove all non-numeric characters
        $cpf = preg_replace('/[^0-9]/', '', $value);

        // Check if length is 11
        if (strlen($cpf) != 11) {
            return false;
        }

        // Check if all digits are the same
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Validate CPF using algorithm
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'Não é um CPF válido!';
    }
}
