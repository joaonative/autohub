<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name("login");
Route::post('/login', [AuthController::class, 'login'])->name("login");

Route::get('/register', [AuthController::class, 'showRegister'])->name("register");
Route::post('/register', [AuthController::class, 'register'])->name("register");

Route::get('/logout', [AuthController::class, 'destroy'])->name("logout");
