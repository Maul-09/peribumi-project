<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduk extends Model
{
    use HasFactory;

    protected $table = 'user_produk';

    protected $fillable = [
        'user_id',
        'produk_id',
        'tanggal_beli' => 'datetime',
        'tanggal_berakhir' => 'datetime',
        'status_transaksi',
        'status_akses',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
