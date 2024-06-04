<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ValidColor;
use App\Rules\ValidType;
use App\Models\Car;

class AdminController extends Controller
{
    public function edit($id)
    {
        $validColors = new ValidColor();
        $allowedColors = $validColors->getAllowedColors();

        $validTypes = new ValidType();
        $allowedTypes = $validTypes->getAllowedTypes();

        $car = Car::findOrFail($id);

        if ($car->admId != auth()->user()->id) {
            return redirect()->back();
        }

        return view("adm.edit")->with("car", $car)->with('colors', $allowedColors)->with('types', $allowedTypes);
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
