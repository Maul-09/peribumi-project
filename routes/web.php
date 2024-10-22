<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin\dashboard');
});

Route::get('/user', 'App\Http\Controllers\PeribumiController@beranda')->name('user/beranda');
Route::get('/user/manajemen', 'App\Http\Controllers\PeribumiController@manajemen')->name('user/manajemen');
Route::get('/user/training', 'App\Http\Controllers\PeribumiController@training')->name('user/training');
Route::get('/user/digital', 'App\Http\Controllers\PeribumiController@digital')->name('user/digital');
Route::get('/user/personal', 'App\Http\Controllers\PeribumiController@personal')->name('user/personal');
Route::get('/user/event', 'App\Http\Controllers\PeribumiController@event')->name('user/event');

Route::get('/auth/logreg', 'App\Http\Controllers\PeribumiController@authentication')->name('logreg');
Route::post('/signup', 'App\Http\Controllers\PeribumiController@signup')->name('signup');

Route::get('/auth/logreg', 'App\Http\Controllers\PeribumiController@authentication')->name('logreg');
Route::post('/signin', 'App\Http\Controllers\PeribumiController@signin')->name('signin');
