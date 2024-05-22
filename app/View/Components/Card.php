<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Card extends Component
{
    public $car;
    public function __construct($car)
    {
        $this->car = $car;
    }

    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
