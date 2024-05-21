<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');
        $isValid = Auth::attempt($credentials);
        if(!$isValid) {
            return redirect()->route('login')->withErrors(['login' => 'Email or password invalid.']);
        }
        
    return redirect()->route('home');
    }

    public function destroy() {
        Auth::logout();
        return redirect()->route('login');
    }

    
    public function showRegister() {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($request->hasFile('imageUrl')) {
            $file = $request->file('imageUrl'); 
            $newFileName = $request->name . '.' . $file->getClientOriginalExtension();
            $path = $request->file('imageUrl')->storeAs('public/images', $newFileName);
        } else {
            $path = "";
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'imageUrl' => $path,
        ]);
    
        Auth::login($user);
    
        return redirect()->route('home');
    }
}
