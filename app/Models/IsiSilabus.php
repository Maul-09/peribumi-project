<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiSilabus extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi secara massal
    protected $fillable = ['silabus_id', 'konten']; // Sesuaikan dengan atribut yang Anda butuhkan

    // Relasi ke model Silabus
    public function silabus()
    {
        return $this->belongsTo(Silabus::class);
    }
}