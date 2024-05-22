<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'imageUrl',
        'state',
        'price',
        'description',
        'year',
        'brand',
        'km',
        'transmission',
        'type',
        'admId'
    ];
}
