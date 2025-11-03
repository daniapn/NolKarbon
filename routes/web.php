<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontributorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kontributor', [KontributorController::class, 'index'])->name('kontributor.index');


