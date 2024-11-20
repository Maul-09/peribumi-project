<?php

namespace App\Http\Controllers;

use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
}
