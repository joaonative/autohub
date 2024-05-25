<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Car;

class CartController extends Controller
{
    public function show()
    {
        $userId = auth()->user()->id;
        $carts = Cart::where('userId', $userId)->get();

        $cars = [];
        foreach ($carts as $cart) {
            $car = Car::find($cart->productId);
            if ($car) {
                $cars[] = $car;
            }
        }
        return view('cart.show')->with('carts', $carts)->with('cars', $cars);
    }

    public function store(Request $request)
    {
        $validatedData =
            $request->validate([
                'productId' => 'required|integer|exists:cars,id',
                'userId' => 'required|integer|exists:users,id',
            ]);
        Cart::create($validatedData);
        return redirect()->route('cart.show')->with('success', 'Car has been added!');
    }

    public function destroy($productId)
    {
        $userId = auth()->user()->id;
        $cart = Cart::where('userId', $userId)
            ->where('productId', $productId)
            ->firstOrFail();
        $cart->delete();
        return redirect()->route('cart.show')->with('success', 'Car has been deleted!');
    }
}
