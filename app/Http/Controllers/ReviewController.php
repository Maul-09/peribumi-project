<?php

namespace App\Http\Controllers;

use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class ReviewController extends Controller
{
    public function reviewStore(Request $request)
    {
        $review = new ReviewRating();
        $review->booking_id = $request->booking_id;
        $review->comments = $request->comment;
        $review->star_rating = $request->rating;
        $review->user_id = Auth::user()->id; // Pastikan Anda memiliki user yang terautentikasi
        $review->save();

        return redirect()->back()->with('flash_msg_success', 'Your review has been submitted successfully.');
    }

    public function index()
    {
        // Mengambil semua rating dan ulasan
        $reviews = ReviewRating::with('user') // Jika Anda ingin mengambil data pengguna juga
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal terbaru
        ->get();

        return view('user.index', compact('reviews')); // Mengirim data ke view
    }
}
