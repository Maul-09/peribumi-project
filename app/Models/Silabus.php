<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Silabus extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi secara massal
    protected $fillable = ['produk_id', 'judul'];

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    // Relasi ke model IsiSilabus
    public function isiSilabus()
    {
        return $this->hasMany(IsiSilabus::class);
    }
}