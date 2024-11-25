<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformasiUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'alamat', 'tanggal_lahir', 'nomor_telepon', 'jenis_kelamin', 'facebook', 'twitter', 'instagram'];

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi ke tabel users
    }
}
