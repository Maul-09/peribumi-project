<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama_produk',
        'teknis',
        'image',
        'deskripsi',
        'durasi',
        'personil',
        'sasaran',
        'persyaratan',
        'metodologi',
        'sasaran',
        'jadwal_lokasi_fasilitas',
        'desc_harga',
        'hl_harga',
        'link',
        'produkType'
    ];
    // Definisikan relasi dengan model Silabus
    public function silabus()
    {
        return $this->hasMany(Silabus::class); // Jika Produk memiliki banyak Silabus
        // return $this->belongsToMany(Silabus::class); // Jika relasi banyak ke banyak
    }

    public function reviewRatings()
    {
        return $this->hasMany(ReviewRating::class, 'booking_id'); // Sesuaikan dengan kolom yang benar
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_produk')
            ->withPivot('status_transaksi', 'tanggal_beli', 'tanggal_berakhir')
            ->wherePivot('status_transaksi', 'confirmed'); // hanya pengguna yang membeli dan mengonfirmasi
    }
}
