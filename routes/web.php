<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FallBackController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdmMiddleware;


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

Route::fallback([FallbackController::class, 'notFound'])->name('fallback');

Route::middleware(['auth'])->group(function () {
    Route::prefix('cars')->group(function () {
        Route::delete('/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
        Route::get('/', [CarController::class, 'index'])->name('cars.index');
        Route::post('/search', [CarController::class, 'index'])->name('cars.search');
        Route::get('/{id}', [CarController::class, 'show'])->name('cars.show');
    });
    Route::redirect('/car', '/cars');
    Route::redirect('/auto', '/cars');
    Route::redirect('/vehicle', '/cars');

    Route::prefix('cart')->group(function () {
        Route::delete('/{productId}', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::get('/', [CartController::class, 'show'])->name('cart.show');
        Route::post('/', [CartController::class, 'store'])->name('cart.store');
    });

    Route::middleware([AdmMiddleware::class])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [CarController::class, 'admDashboard'])->name('admin.index');
            Route::get('/edit', [AdminController::class, 'edit'])->name('admin.edit');
            Route::get('/create', [AdminController::class, 'store'])->name('admin.store');
            Route::post('/create', [CarController::class, 'store'])->name('admin.store');
        });
        Route::redirect('/adm', '/admin');
        Route::redirect('/manager', '/admin');
        Route::redirect('/moderator', '/admin');
    });
});
