<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontributorController;
use App\Http\Controllers\AuthController;

// Halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Halaman Kontributor
Route::get('/kontributor', [KontributorController::class, 'index'])->name('kontributor.index');

// Halaman Admin (Statistik Emisi)
Route::get('/Admin', function () {
    return view('statistikemisi');
});

// Halaman Register & Login (Auth)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
