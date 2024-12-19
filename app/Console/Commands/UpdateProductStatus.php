<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserProduk;

class UpdateProductStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-product-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Mendapatkan semua produk dengan status aktif dan masa aktif habis
        $products = UserProduk::where('status_akses', 'aktif') // Asumsi status produk aktif
            ->where('tanggal_berakhir', '<', now()) // Gantilah `expiry_date` dengan kolom yang sesuai
            ->get();

        // Loop untuk mengupdate status produk
        foreach ($products as $product) {
            $product->status_akses = 'nonaktif'; // Ubah status menjadi nonaktif
            $product->save();
            $this->info("Produk dengan nomor transaksi {$product->nomor_transaksi} telah diperbarui menjadi nonaktif.");
        }

        $this->info('Status produk yang expired telah diperbarui.');
    }
}