<?php

namespace App\Http\Controllers;

class PeribumiController extends Controller
{
    public function beranda()
    {
        return view('user.beranda');
    }

    public function manajemen()
    {
        return view('user.manajemen');
    }

    public function training()
    {
        return view('user.training');
    }

    public function personal()
    {
        return view('user.personal');
    }

    public function digital()
    {
        return view('user.digital');
    }

    public function event()
    {
        return view('user.event');
    }

    public function logreg()
    {
        return view('auth.logreg');
    }

}
