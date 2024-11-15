<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'user_id', 'star_rating', 'comments'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'booking_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
