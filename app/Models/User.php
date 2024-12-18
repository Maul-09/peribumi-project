<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomVerifyEmailNotification;
use Illuminate\Support\Str; // Import Str untuk UUID
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

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
        'image',
        'usertype',
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
            ->withPivot('tanggal_mulai', 'status_akses', 'status_transaksi', 'tanggal_beli', 'tanggal_berakhir', 'nomor_transaksi')
            ->withTimestamps(); 
    }

    public function informasiUser()
    {
        return $this->hasOne(InformasiUser::class, 'user_id', 'id');
    }

    public function userproduk()
    {
        return $this->hasMany(UserProduk::class, 'user_id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmailNotification());
    }
}
