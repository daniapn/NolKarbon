<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontributorController;
use App\Http\Controllers\ChallengeAdminController;
use App\Http\Controllers\ChallengeUserController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ReportAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

// Halaman utama (welcome) (dn)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/NolKarbon', function () {
    return view('HalamanUtama');
});

// Artikel (dn)
Route::get('/kontributor', [KontributorController::class, 'index'])->name('kontributor.index');
Route::get('/kontributor/editdraft/{id}', [KontributorController::class, 'editDraft'])->name('kontributor.editdraft');
Route::get('/kontributor/viewdraft/{id}', [KontributorController::class, 'viewDraft'])->name('kontributor.viewdraft');
Route::put('/kontributor/updatedraft/{id}', [KontributorController::class, 'updateDraft'])->name('kontributor.updatedraft');
Route::delete('/kontributor/deletedraft/{id}', [KontributorController::class, 'deleteDraft'])->name('kontributor.deletedraft');
Route::post('/kontributor/submitdraft/{id}', [KontributorController::class, 'submitDraft'])->name('kontributor.submitdraft');
Route::get('/artikel/create-draft', [KontributorController::class, 'createDraft'])->name('kontributor.createdraft');
Route::post('/artikel/store-draft', [KontributorController::class, 'storeDraft'])->name('kontributor.storedraft');
Route::get('/kontributor/notif', [KontributorController::class, 'getNotif'])->name('kontributor.notif');
Route::get('/admin/review', [AdminController::class, 'reviewDraft'])->name('admin.reviewdraft');
Route::post('/admin/unpublish/{id}', [AdminController::class, 'unpublish'])->name('admin.unpublish');
Route::get('/admin/formreview/{id}', [AdminController::class, 'formReview'])->name('admin.formreview');
Route::post('/admin/formreview/{id}', [AdminController::class, 'formReview'])->name('admin.formreview');
Route::post('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
Route::post('/admin/tolak/{id}', [AdminController::class, 'tolak'])->name('admin.tolak');
Route::post('/admin/revisi/{id}', [AdminController::class, 'revisi'])->name('admin.revisi');


Route::get('/NolKarbon', function () {
    return view('HalamanUtama');
})->name('logout');

// login & register (aurel)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// leaderboard & communities
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');
Route::get('/communities/dashboard', [CommunityController::class, 'dashboard'])->name('communities.dashboard');

// challenge (user)
Route::prefix('challenges')->name('challenges.')->group(function () {
    Route::get('/', [ChallengeUserController::class, 'index'])->name('index');
    Route::get('/dashboard', [ChallengeUserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/badges', [ChallengeUserController::class, 'badges'])->name('badges');

    Route::get('/{challenge}/join', [ChallengeUserController::class, 'joinForm'])->name('join');
    Route::post('/{challenge}/join', [ChallengeUserController::class, 'join'])->name('join.store');

    Route::get('/{challenge}/progress', [ChallengeUserController::class, 'progressForm'])->name('progress.create');
    Route::post('/{challenge}/progress', [ChallengeUserController::class, 'progress'])->name('progress.store');

    Route::get('/{challenge}', [ChallengeUserController::class, 'show'])->name('show');
});

// admin (gabungan semua)
Route::prefix('admin')->name('admin.')->group(function () {
    // dashboard & reports
    Route::get('/dashboard', [ChallengeAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reports', [ReportAdminController::class, 'index'])->name('reports.index');
    Route::get('/reports/activities', [ReportAdminController::class, 'activities'])->name('reports.activities');
    
    // route dari versi lama
    Route::resource('challenge', ChallengeAdminController::class);

    // route tambahan dari versi kamu
    Route::resource('challenges', ChallengeAdminController::class);
    Route::get('/dashboardadmin', [AdminController::class, 'dashboardAdmin'])->name('dashboardadmin');
    Route::get('/usermanagement', [AdminController::class, 'userManagement'])->name('usermanagement');
});

// statistik
Route::get('/admin/statistik', function () {
    return view('Admin/statistikemisi');
});

// logout (versi kamu)
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
