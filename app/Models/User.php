<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes
use Illuminate\Support\Str; // Import Str untuk UUID

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory, SoftDeletes; // Tambahkan SoftDeletes

    protected $keyType = 'string'; // Menentukan bahwa tipe kunci adalah string
    protected $dates = ['deleted_at'];
    public $incrementing = false;   // Menonaktifkan auto-increment

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'image' // Tambahkan 'image' jika Anda menyimpan gambar profil
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid(); // Menghasilkan UUID saat membuat model
        });
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'user_produk')
        ->withPivot('status_transaksi', 'tanggal_beli', 'tanggal_berakhir')
        ->wherePivot('status_transaksi', 'confirmed'); // hanya produk yang terkonfirmasi
    }

    public function informasiUser()
    {
        return $this->hasOne(InformasiUser::class, 'user_id', 'id');
    }
    // Anda juga dapat menambahkan metode lain di sini jika diperlukan
}
