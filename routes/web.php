<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeribumiController;

Route::get('/admin', function () {
    return view('admin\dashboard');
});

route::middleware('auth')->group(function() {
    Route::get('/manajemen', [PeribumiController::class, 'manajemen'])->name('manajemen');
    Route::get('/training', [PeribumiController::class, 'training'])->name('training');
    Route::get('/digital', [PeribumiController::class, 'digital'])->name('digital');
    Route::get('/personal', [PeribumiController::class, 'personal'])->name('personal');
    Route::get('/event', [PeribumiController::class, 'event'])->name('event');
});

Route::get('/', [PeribumiController::class, 'beranda'])->name('beranda');

Route::post('/signup', [PeribumiController::class, 'signup'])->name('signup');
Route::get('/auth/logreg', [PeribumiController::class, 'authentication'])->name('logreg');
Route::post('/signin', [PeribumiController::class, 'signin'])->name('signin');
Route::post('/logout', [PeribumiController::class, 'logout'])->name('logout');
