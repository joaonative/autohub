<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FallBackController;

Route::get('/', function () {
    return view('home.index');
})->name('home');
Route::redirect('/home', '/');
Route::redirect('/homepage', '/');
Route::redirect('/home-page', '/');

Route::get('/login', [AuthController::class, 'showLogin'])->name("login");
Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::redirect('/signin', '/login');

Route::get('/register', [AuthController::class, 'showRegister'])->name("register");
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::redirect('/newuser', '/register');
Route::redirect('/signup', '/register');

Route::get('/logout', [AuthController::class, 'destroy'])->name("logout");

Route::fallback([FallbackController::class, 'notFound']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('cars')->group(function () {
        Route::get('/', [CarController::class, 'index'])->name('cars.index');
        Route::post('/search', [CarController::class, 'index'])->name('cars.search');
        Route::get('/{id}', [CarController::class, 'show'])->name('cars.show');
        Route::post('/', [CarController::class, 'store'])->name('cars.store');
        Route::delete('/', [CarController::class, 'destroy'])->name('cars.destroy');
    });
    Route::redirect('/car', '/cars');
    Route::redirect('/auto', '/cars');
    Route::redirect('/vehicle', '/cars');

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'show'])->name('cart.show');
        Route::put('/', [CartController::class, 'store'])->name('cart.store');
        Route::delete('/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    });
});
