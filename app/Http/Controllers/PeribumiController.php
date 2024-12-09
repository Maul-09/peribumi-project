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
        $kat = ['Pengembangan (Inkubasi) Bisnis', 'Pendampingan Manajemen Bisnis'];

        session(['kategori' => $kat]);

        return view('user.manajemen');
    }

    public function training()
    {
        $kat = ['Pelatihan Calon Tenaga Kerja', 'Pelatihan Tenaga Kerja (Profesi)'];

        session(['kategori' => $kat, 'route' => 'training.admin']);

        return view('user.training');
    }

    public function personal()
    {
        $kat = ['Individu', 'Kelompok'];

        session(['kategori' => $kat, 'route' => 'personal.admin']);

        return view('user.personal');
    }

    public function digital()
    {
        $kat = ['Software/Aplikasi/Website', 'Artificial Intelegence'];

        session(['kategori' => $kat, 'route' => 'digital.admin']);

        return view('user.digital');
    }

    public function event()
    {
        $kat = ['MICE & Travel Vacation', 'Wedding & Integrated Event'];

        session(['kategori' => $kat, 'route' => 'organizer.admin']);

        return view('user.event');
    }

    public function login()
    {

        return view('auth.login');
    }

    public function aboutUs()
    {
        return view('user.about-us');
    }
}
