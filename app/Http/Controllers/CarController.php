<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Car;
use App\Rules\ValidColor;
use App\Rules\ValidType;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();
        
        if($request->filled('name')) {
            $query->where('name','like','%'. $request->input('name') .'%');
        }

        if($request->filled('min') && $request->filled('max')) {
          $query->whereBetween('price', [$request->input('min'), $request->input('max')]);
        }

        if($request->filled('state')) {
            $query->where('state', $request->input('state'));
        }

        if($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('color')) {
            $query->where('color', $request->input('color'));
        }
        
        if ($request->filled('transmission')) {
            $query->where('transmission', $request->input('transmission'));
        }

        $cars = $query->get();

        return view('cars.index')->with('cars', $cars);
    }

    public function store(Request $request){
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

        return redirect()->route('cars.index')->with('success', 'Car has been created!');
    }

    public function show($id){
        $car = Car::findOrFail($id);
        if (!$car) {
            abort(404);
        }
        return view('cars.show')->with('car', $car);
    }

    public function destroy($id)
    {
       
        $car = Car::findOrFail($id);

        // Verificar se o carro existe
        if ($car) {
            // Excluir o carro
            $car->delete();

            return redirect()->route('cars.index')->with('success', 'Car has been deleted!');
        }}


}