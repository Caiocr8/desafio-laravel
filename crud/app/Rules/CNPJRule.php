<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CNPJRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Remove all non-numeric characters
        $cnpj = preg_replace('/[^0-9]/', '', $value);

        // Check if length is 14
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Check if all digits are the same
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        // Validate CNPJ using algorithm
        for ($t = 12; $t < 14; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cnpj[$c] * (($t + 1) - ($c % 8 + 2));
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cnpj[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'Não é um CNPJ válido!';
    }
}
