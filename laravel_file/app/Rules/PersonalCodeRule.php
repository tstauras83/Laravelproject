<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PersonalCodeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $personalCode = str_pad($value, 11, '0', STR_PAD_LEFT);
        $gender = (int)substr($personalCode, 0, 1);
        $year = (int)substr($personalCode, 1, 2);
        $month = (int)substr($personalCode, 3, 2);
        $day = (int)substr($personalCode, 5, 2);
        $sequence = (int)substr($personalCode, 7, 3);

        if ($gender < 1 || $gender > 6) {
            $this->errorMessage = "The first digit of the personal code must be between 1 and 6.";
            return false;
        }
        if ($month < 1 || $month > 12) {
            $this->errorMessage = "The month must be between 1 and 12.";
            return false;
        }
        if ($day < 1 || $day > 31) {
            $this->errorMessage = "The day must be between 1 and 31.";
            return false;
        }
        if ($sequence < 1 || $sequence > 999) {
            $this->errorMessage = "The sequence must be between 1 and 999.";
            return false;
        }
        if ($gender % 2 === 0) {
            $year += 1800;
        } else {
            $year += 1900;
        }
        if (!checkdate($month, $day, $year)) {
            $this->errorMessage = "The date is invalid.";
            return false;
        }

        return true;
    }

    public function message()
    {
        return $this->errorMessage;
    }
}
