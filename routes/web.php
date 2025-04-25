<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
 return view('welcome');
});
Route::resource('products', ProductController::class);

// Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Protected route
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware('auth');