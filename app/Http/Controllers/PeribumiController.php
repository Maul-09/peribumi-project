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
        $kat = ['Rencana Bisnis', 'Sistem Manajemen Bisnis', 'Inkubasi Bisnis'];

        session(['kategori' => $kat, 'route' => 'manajemen']);

        return view('user.manajemen');
    }

    public function training()
    {
        $kat = ['Spesifik (Okupasi)', 'Generik (Klaster)', 'Tematik (Bimtek)'];

        session(['kategori' => $kat, 'route' => 'training']);

        return view('user.training');
    }

    public function personal()
    {
        $kat = ['Pembinaan (Coaching)', 'Penyuluhan (Counseling)', 'Pembentukan (Building)'];

        session(['kategori' => $kat, 'route' => 'personal']);

        return view('user.personal');
    }

    public function digital()
    {
        $kat = ['Barang Digital', 'Jasa Digital', 'Kecerdasan Buatan (Artificial Intelligence)'];

        session(['kategori' => $kat, 'route' => 'digital']);

        return view('user.digital');
    }

    public function event()
    {
        $kat = ['MICE', 'Vacation', 'Promotion'];

        session(['kategori' => $kat, 'route' => 'event']);

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
