<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;

class TrackVisits
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->path();

        // Cek apakah URL sudah ada di database, jika ada tambahkan count
        $visit = Visit::where('url', $url)->first();

        if ($visit) {
            $visit->increment('count');
        } else {
            Visit::create(['url' => $url, 'count' => 1]);
        }

        return $next($request);
    }
}

