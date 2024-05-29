<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ValidColor;
use App\Rules\ValidType;

class AdminController extends Controller
{
    public function edit()
    {
        return view("adm.edit");
    }

    public function store()
    {
        $validColors = new ValidColor();
        $allowedColors = $validColors->getAllowedColors();

        $validTypes = new ValidType();
        $allowedTypes = $validTypes->getAllowedTypes();
        return view("adm.store")->with('colors', $allowedColors)->with('types', $allowedTypes);
    }
}
