<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\PeribumiController;


Route::get('/admin', function () {
    return view('admin\dashboard');
});

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('/manajemen', [PeribumiController::class, 'manajemen'])->name('manajemen');
        Route::get('/training', [PeribumiController::class, 'training'])->name('training');
        Route::get('/digital', [PeribumiController::class, 'digital'])->name('digital');
        Route::get('/personal', [PeribumiController::class, 'personal'])->name('personal');
        Route::get('/event', [PeribumiController::class, 'event'])->name('event');
    });

    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware('throttle:6,1')->name('verification.send');
});

Route::get('/', [PeribumiController::class, 'beranda'])->name('beranda');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/auth/logreg', [PeribumiController::class, 'logreg'])->name('logreg');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/edit/profile{id}', [CrudController::class, 'editProfile'])->name('editProfile');

Route::get('admin/dashboard', [AuthController::class, 'admin'])
    ->middleware(['auth', 'admin']);
