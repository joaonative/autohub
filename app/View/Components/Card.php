<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Card extends Component
{
    public $name;
    public $price;
    public $type;
    public $color;
    public $year;
    public $id;
    public $isLiked;
    public $imageUrl;
    public $colorName;
    public function __construct($name, $price, $type, $color, $year, $id, $isLiked, $imageUrl, $colorName)
    {
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->color = $color;
        $this->year = $year;
        $this->id = $id;
        $this->isLiked = $isLiked;
        $this->imageUrl = $imageUrl;
        $this->colorName = $colorName;
    }

    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
