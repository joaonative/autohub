<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function show()
    {
        $userId = auth()->user()->id;
        $carts = Cart::whereAll(["userId"], $userId)->get();

        return view('cart.show')->with('carts', $carts);
    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $validatedData = $request->validate([
            'productId' => 'required|integer|exists:cars,id'
        ]);
        $cart = Cart::create([$validatedData, $userId]);
        return redirect()->route('cart.show')->with('success', 'Car has been added!')->with('created_cart', $cart);
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        if (!$cart) {
            abort(404);
        }
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Car has been deleted!');
    }
}
