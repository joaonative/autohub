<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class ValidColor implements Rule
{
    protected $allowedColors = [
    'white'=>'#FFF',
    'black'=>'#000',
    'blue' => '#0000FF',
    'green' => '#00FF00',
    'yellow' => '#FFFF00',
    'silver' => '#C0C0C0',
    'gray' => '#808080',
    'orange' => '#FFA500',
    'purple' => '#800080',
    'brown' => '#964B00',
    'pink' => '#FFC0CB'
    ];

    public function passes($attribute, $value)
    {
        return in_array($value, $this->allowedColors);
    }
    public function message()
    {
        return 'Invalid Color.';
    }

    public function getAllowedColors()
    {
        return $this->allowedColors;
    }

    public function randomAllowedColors()
    {
        return $this->allowedColors[array_rand($this->allowedColors)];
    }

}
