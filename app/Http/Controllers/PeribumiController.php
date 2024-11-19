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

        $produkGrouped = Produk::whereIn('produkType', $kat)->get()->groupBy('produkType');

        foreach ($produkGrouped as $key => $produks) {
            foreach ($produks as $produk) {
                $produk->averageRating = ReviewRating::where('booking_id', $produk->id)->average('star_rating') ?? 0;
            }
        }

        return view('user.manajemen', compact('produkGrouped'));
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
