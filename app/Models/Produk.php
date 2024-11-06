<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama_produk',
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
        'produkType'
    ];
    // Definisikan relasi dengan model Silabus
    public function silabus()
    {
        return $this->hasMany(Silabus::class); // Jika Produk memiliki banyak Silabus
        // return $this->belongsToMany(Silabus::class); // Jika relasi banyak ke banyak
    }
}
