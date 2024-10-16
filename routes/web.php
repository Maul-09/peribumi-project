<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PeribumiController@beranda')->name('beranda');
Route::get('/manajemen', 'App\Http\Controllers\PeribumiController@manajemen')->name('manajemen');
