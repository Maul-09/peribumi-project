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

    public function training()
    {
        return view('training');
    }

    public function personal()
    {
        return view('personal');
    }

    public function digital()
    {
        return view('digital');
    }

    public function event()
    {
        return view('event');
    }
}
