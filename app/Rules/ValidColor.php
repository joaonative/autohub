<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class ValidColor implements Rule
{
    protected $allowedColors = ['#FFF', '#000', '#0000FF', '#00FF00', '#FFFF00', '#C0C0C0', '#808080', '#FFA500', '#800080', '#964B00', '#FFC0CB'];

    public function passes($attribute, $value)
    {
        return in_array($value, $this->allowedColors);
    }
    public function message()
    {
        return 'Invalid Color.';
    }
}
