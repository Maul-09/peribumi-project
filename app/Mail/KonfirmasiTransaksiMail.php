<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KonfirmasiTransaksiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaksi;

    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Transaksi Anda')
            ->view('emails.konfirmasi_transaksi');
    }
}
