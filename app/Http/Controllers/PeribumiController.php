<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ReviewRating;

class PeribumiController extends Controller
{
    public function beranda()
    {
        return view('user.beranda');
    }

    public function manajemen()
    {
        $kat = ['Pengembangan Bisnis', 'Pendampingan Manajemen Bisnis'];

        session(['kategori' => $kat, 'route' => 'manajemen.admin']);

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

    public function login()
    {
        return view('auth.login');
    }
}
