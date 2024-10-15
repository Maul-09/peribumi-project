<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PeribumiController@beranda')->name('beranda');
