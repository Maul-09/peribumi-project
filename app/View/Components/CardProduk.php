<?php

namespace App\View\Components;

use Closure;
use App\Models\Produk;
use App\Models\ReviewRating;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CardProduk extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $kategori = session('kategori', []);

        $produkGrouped = Produk::whereIn('produkType', $kategori)->get()->groupBy('produkType');

        foreach ($kategori as $kategori) {
            if (!$produkGrouped->has($kategori)) {
                $produkGrouped[$kategori] = collect();  // Set produk kosong jika kategori tidak ada
            }
        }

        foreach ($produkGrouped as $key => $produks) {
            foreach ($produks as $produk) {
                $produk->averageRating = ReviewRating::where('booking_id', $produk->id)->average('star_rating') ?? 0;
            }
        }
        
        return view('components.card-produk', ['produkGrouped' => $produkGrouped]);
    }
}
