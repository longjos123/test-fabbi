<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxNumeric implements Rule
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public function passes($attribute, $value)
    {
        return is_numeric($value) && $value <= $this->max;
    }

    public function message()
    {
        return 'The :attribute must be a number not greater than ' . $this->max . '.';
    }
}
