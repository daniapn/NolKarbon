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
Route::get('/kontributor/editdraft/{id}', [KontributorController::class, 'editDraft'])->name('kontributor.editdraft');
Route::get('/kontributor/viewdraft/{id}', [KontributorController::class, 'viewDraft'])->name('kontributor.viewdraft');
Route::put('/kontributor/updatedraft/{id}', [KontributorController::class, 'updateDraft'])->name('kontributor.updatedraft');
Route::delete('/kontributor/deletedraft/{id}', [KontributorController::class, 'deleteDraft'])->name('kontributor.deletedraft');
Route::post('/kontributor/submitdraft/{id}', [KontributorController::class, 'submitDraft'])->name('kontributor.submitdraft');
Route::get('/artikel/create-draft', [KontributorController::class, 'createDraft'])->name('kontributor.createdraft');
Route::post('/artikel/store-draft', [KontributorController::class, 'storeDraft'])->name('kontributor.storedraft');
Route::get('/kontributor/notif', [KontributorController::class, 'getNotif'])->name('kontributor.notif');




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

//Halaman Kalkulator
use App\Http\Controllers\EmisiController;

Route::get('/kalkulator-emisi', [EmisiController::class, 'index']);
Route::post('/hitung-emisi', [EmisiController::class, 'hitung'])->name('hitung.emisi');
Route::get('/emisi-saved', [EmisiController::class, 'saved']);
Route::get('/hasil-emisi', [EmisiController::class, 'hasil']);

