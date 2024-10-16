<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeribumiController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function manajemen()
    {
        return view('manajemen');
    }
}
