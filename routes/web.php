<?php

use App\Http\Controllers\EmailVerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/admin', function () {
    return view('admin\dashboard');
});

Route::get('/', 'App\Http\Controllers\PeribumiController@beranda')->name('beranda');
Route::get('/manajemen', 'App\Http\Controllers\PeribumiController@manajemen')->name('manajemen');
Route::get('/training', 'App\Http\Controllers\PeribumiController@training')->name('training');
Route::get('/digital', 'App\Http\Controllers\PeribumiController@digital')->name('digital');
Route::get('/personal', 'App\Http\Controllers\PeribumiController@personal')->name('personal');
Route::get('/event', 'App\Http\Controllers\PeribumiController@event')->name('event');

Route::get('/auth/logreg', 'App\Http\Controllers\PeribumiController@authentication')->name('logreg');
Route::post('/signup', 'App\Http\Controllers\PeribumiController@signup')->name('signup');

Route::get('/auth/logreg', 'App\Http\Controllers\PeribumiController@authentication')->name('logreg');
Route::post('/signin', 'App\Http\Controllers\PeribumiController@signin')->name('signin');

Route::get('/logreg', [EmailVerificationController::class, 'signup'])
    ->middleware('auth')
    ->name('verification.notice');

Route::post('/verify_email/request', [EmailVerificationController::class, 'request'])
    ->middleware('auth')
    ->name('verification.request');

Route::post('/verify_email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed']) // <-- don't remove "signed"
    ->name('verification.verify');
