<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Visit;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function filterData(Request $request)
    {
        $range = $request->query('range');
        $data = [];

        if ($range === 'today') {
            $data = Visit::whereDate('created_at', Carbon::today())
                ->select(DB::raw("DATE(created_at) as date"), DB::raw("SUM(count) as total_visits"))
                ->groupBy('date')
                ->get();
        } elseif ($range === 'month') {
            $data = Visit::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->select(DB::raw("DATE(created_at) as date"), DB::raw("SUM(count) as total_visits"))
                ->groupBy('date')
                ->get();
        } elseif ($range === 'year') {
            $data = Visit::whereYear('created_at', Carbon::now()->year)
                ->select(DB::raw("DATE(created_at) as date"), DB::raw("SUM(count) as total_visits"))
                ->groupBy('date')
                ->get();
        }

        // Siapkan data untuk chart
        $weeks = $data->pluck('date'); // Atur data tanggal
        $visits = $data->pluck('total_visits'); // Ambil total kunjungan

        return response()->json(['weeks' => $weeks, 'visits' => $visits]);
    }

    public function admin()
    {
        // Mengelompokkan data pengunjung per minggu
        $visitData = Visit::select(
            DB::raw("YEARWEEK(created_at, 1) as week"),
            DB::raw("MIN(created_at) as start_date"),
            DB::raw("SUM(count) as total_visits")
        )
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        // Format tanggal untuk ApexCharts
        $weeks = $visitData->map(function ($item) {
            return Carbon::parse($item->start_date)->format('Y-m-d'); // Format Y-m-d untuk ApexCharts
        });

        // Total kunjungan per minggu
        $visits = $visitData->pluck('total_visits');

        // Menghitung jumlah pengguna dengan usertype 'user'
        $userCount = User::where('usertype', 'user')->count();

        // Mendapatkan data url dan count untuk kebutuhan lain di view
        $urlCounts = Visit::select('url', 'count')->get();

        $totalProducts = Produk::count();

        // Mengembalikan view dashboard dengan data yang dibutuhkan
        return view('admin.dashboard', compact('userCount', 'urlCounts', 'weeks', 'visits', 'totalProducts'));
    }



    public function manajemenAdmin()
    {
        $kat = ['Pengembangan Bisnis', 'Pendampingan Manajemen Bisnis'];

        session(['kategori' => $kat, 'route' => 'manajemen.admin']);

        $produkGrouped = Produk::whereIn('produkType', $kat)->get()->groupBy('produkType');

        return view('admin.manajemen-business', compact('produkGrouped'));
    }

    public function trainingAdmin()
    {
        $kat = ['Pelatihan Calon Tenaga Kerja', 'Pelatihan Tenaga Kerja Aktif'];

        session(['kategori' => $kat, 'route' => 'training.admin']);

        $produkGrouped = Produk::whereIn('produkType', $kat)->get()->groupBy('produkType');

        foreach ($kat as $kategori) {
            if (!$produkGrouped->has($kategori)) {
                $produkGrouped[$kategori] = collect();  // Set produk kosong jika kategori tidak ada
            }
        }

        return view('admin.training-center', compact('produkGrouped'));
    }

    public function digitalAdmin()
    {
        $kat = ['Software/Aplikasi/Website', 'Artificial Intelegence'];

        session(['kategori' => $kat, 'route' => 'digital.admin']);

        $produkGrouped = Produk::whereIn('produkType', $kat)->get()->groupBy('produkType');

        foreach ($kat as $kategori) {
            if (!$produkGrouped->has($kategori)) {
                $produkGrouped[$kategori] = collect();  // Set produk kosong jika kategori tidak ada
            }
        }

        return view('admin.digital-solution',  compact('produkGrouped'));
    }

    public function personalAdmin()
    {
        $kat = ['Individu', 'Kelompok'];

        session(['kategori' => $kat, 'route' => 'personal.admin']);

        $produkGrouped = Produk::whereIn('produkType', $kat)->get()->groupBy('produkType');

        foreach ($kat as $kategori) {
            if (!$produkGrouped->has($kategori)) {
                $produkGrouped[$kategori] = collect();  // Set produk kosong jika kategori tidak ada
            }
        }

        return view('admin.personal-development', compact('produkGrouped'));
    }

    public function organizerAdmin()
    {
        $kat = ['MICE & Travel Vacation', 'Wedding & Integrated Event'];

        session(['kategori' => $kat, 'route' => 'organizer.admin']);

        $produkGrouped = Produk::whereIn('produkType', $kat)->get()->groupBy('produkType');

        foreach ($kat as $kategori) {
            if (!$produkGrouped->has($kategori)) {
                $produkGrouped[$kategori] = collect();  // Set produk kosong jika kategori tidak ada
            }
        }

        return view('admin.organizer', compact('produkGrouped'));
    }
}
