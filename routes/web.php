<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PeribumiController@beranda')->name('beranda');
Route::get('/manajemen', 'App\Http\Controllers\PeribumiController@manajemen')->name('manajemen');
Route::get('/training', 'App\Http\Controllers\PeribumiController@training')->name('training');
Route::get('/digital', 'App\Http\Controllers\PeribumiController@digital')->name('digital');
Route::get('/personal', 'App\Http\Controllers\PeribumiController@personal')->name('personal');
Route::get('/event', 'App\Http\Controllers\PeribumiController@event')->name('event');
