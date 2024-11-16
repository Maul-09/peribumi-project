<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class RecordVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        // Simpan hanya jika belum ada pengunjung dengan IP ini hari ini
        $exists = Visitor::where('ip_address', $ip)
            ->whereDate('created_at', now()->toDateString())
            ->exists();

        if (!$exists) {
            Visitor::create(['ip_address' => $ip]);
        }

        return $next($request);
    }
}
