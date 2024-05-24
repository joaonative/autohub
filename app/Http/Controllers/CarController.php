<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Car;
use App\Rules\ValidColor;
use App\Rules\ValidType;
use App\Models\User;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('min') && $request->filled('max')) {
            $query->whereBetween('price', [$request->input('min'), $request->input('max')]);
        }

        if ($request->input('state')) {
            $query->where('state', $request->input('state'));
        }

        if ($request->filled('type') && !$request->input('type_all')) {
            $types = $request->input('type');
            if (is_array($types)) {
                $query->whereIn('type', $types);
            } else {
                $query->where('type', $types);
            }
        }

        if ($request->filled('color') && !$request->input('color_all')) {
            $colorsInput = $request->input('color');
            if (is_array($colorsInput)) {
                $query->whereIn('color', $colorsInput);
            } else {
                $query->where('color', $request->input('color'));
            }
        }

        if ($request->filled('transmission')) {
            $query->where('transmission', $request->input('transmission'));
        }
        $query->orderBy('created_at', 'desc');
        $cars = $query->get();

        $validType = new ValidType();
        $allowedTypes = $validType->getAllowedTypes();

        $validColors = new ValidColor();
        $allowedColors = $validColors->getAllowedColors();

        return view('cars.index')->with('cars', $cars)->with('types', $allowedTypes)->with('colors', $allowedColors);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => ['required', 'string', new ValidColor],
            'price' => 'required|numeric',
            'type' => ['required', 'string', new ValidType],
            'state' => 'required|boolean',
            'transmission' => 'required|boolean',
            'km' => 'required|float',
            'year' => 'required|integer|digits:4',
            'admId' => 'required|integer|exists:users,id',
        ]);
        $car = Car::create($validatedData);

        return redirect()->route('cars.index')->with('success', 'Car has been created!')->with('created_car', $car);
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        $adm = User::where('adm', 1)->findOrFail($car->admId);
        if (!$car || !$adm) {
            abort(404);
        }
        return view('cars.show')->with('car', $car)->with('adm', $adm);
    }

    public function destroy($id)
    {

        $car = Car::findOrFail($id);

        // Verificar se o carro existe
        if ($car) {
            // Excluir o carro
            $car->delete();

            return redirect()->route('cars.index')->with('success', 'Car has been deleted!');
        }
    }


}