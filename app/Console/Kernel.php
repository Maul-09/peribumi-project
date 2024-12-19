<?php

namespace App\Console;

use App\Console\Commands\UpdateProductStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // Daftarkan semua command di sini
    protected $commands = [
        UpdateProductStatus::class,
    ];

    // Menjadwalkan cron job (jika diperlukan)
    protected function schedule(Schedule $schedule)
    {
        // Menjadwalkan command untuk dijalankan setiap hari
        $schedule->command('app:update-product-status')->daily();
    }
}

