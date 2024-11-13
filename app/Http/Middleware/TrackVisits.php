<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;
use Carbon\Carbon;

class TrackVisits
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->path();
        $today = Carbon::now()->format('Y-m-d'); // Ambil tanggal hari ini

        // Cek apakah ada entri URL untuk tanggal hari ini
        $visit = Visit::where('url', $url)->whereDate('created_at', $today)->first();

        if ($visit) {
            $visit->increment('count');
        } else {
            Visit::create(['url' => $url, 'count' => 1]);
        }

        return $next($request);
    }
}
