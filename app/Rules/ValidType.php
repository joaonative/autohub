<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class ValidType implements Rule
{
    protected $allowedTypes = ['Convertible', 'Sedan', 'SUV', 'Hatchback', 'Sports Car', 'Off Road'];

    public function passes($attribute, $value)
    {
        return in_array($value, $this->allowedTypes);
    }
    public function message()
    {
        return 'Invalid Type.';
    }
}
