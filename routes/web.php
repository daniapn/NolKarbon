<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeAdminController;
use App\Http\Controllers\ChallengeUserController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ReportAdminController;


// Halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/NolKarbon', function () {
    return view('HalamanUtama');
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

Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');
Route::get('/communities/dashboard', [CommunityController::class, 'dashboard'])->name('communities.dashboard');

Route::prefix('challenge')->name('challenge.')->group(function () {
    Route::get('/', [ChallengeUserController::class, 'index'])->name('index');
    Route::get('/dashboard', [ChallengeUserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/badges', [ChallengeUserController::class, 'badges'])->name('badges');

    Route::get('/{challenge}/join', [ChallengeUserController::class, 'joinForm'])->name('join');
    Route::post('/{challenge}/join', [ChallengeUserController::class, 'join'])->name('join.store');

    Route::get('/{challenge}/progress', [ChallengeUserController::class, 'progressForm'])->name('progress.create');
    Route::post('/{challenge}/progress', [ChallengeUserController::class, 'progress'])->name('progress.store');

    Route::get('/{challenge}', [ChallengeUserController::class, 'show'])->name('show');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [ChallengeAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reports', [ReportAdminController::class, 'index'])->name('reports.index');
    Route::get('/reports/activities', [ReportAdminController::class, 'activities'])->name('reports.activities');
    Route::resource('challenge', ChallengeAdminController::class);
});

Route::get('/admin/statistik', function () {
    return view('admin/reports/statistikemisi');
});