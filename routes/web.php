<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\PeribumiController;

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('/manajemen', [PeribumiController::class, 'manajemen'])->name('manajemen');
        Route::get('/training', [PeribumiController::class, 'training'])->name('training');
        Route::get('/digital', [PeribumiController::class, 'digital'])->name('digital');
        Route::get('/personal', [PeribumiController::class, 'personal'])->name('personal');
        Route::get('/event', [PeribumiController::class, 'event'])->name('event');
    });

    Route::get('admin/dashboard', [AuthController::class, 'admin'])->middleware(['admin'])->name('admin');

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
Route::post('/edit/profile/delete{id}', [CrudController::class, 'deleteAccount'])->name('deleteAccount');

Route::get('/forgot-password', [CrudController::class, 'forgotView'])->name('password.request');

Route::post('/forgot-password', [CrudController::class, 'forgotSend'])->name('password.email');

Route::get('/reset-password/{token}', [CrudController::class, 'forgotHandler'])->name('password.reset');

Route::post('/reset-password', [CrudController::class, 'forgotUpdate'])->name('password.update');

Route::post('/restore-user', [CrudController::class, 'restoreByEmail'])->name('restore.user');

Route::get('/restore-confirm', [CrudController::class, 'confirmRestore'])->name('restore.confirm');

Route::get('/trash', [CrudController::class, 'trash'])->name('trash');

Route::get('/after-restore', [CrudController::class, 'afterRestore'])->name('after.restore');
