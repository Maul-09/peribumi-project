<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Visit;
use App\Models\Produk;
use App\Models\Visitor;
use App\Models\UserProduk;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function admin()
    {
        // Menghitung jumlah pengguna dengan usertype 'user'
        $userCount = User::where('usertype', 'user')->count();

        $totalProducts = Produk::count();

        $averageRating = ReviewRating::average('star_rating');
        $formattedAverageRating = number_format($averageRating, 1);

        $currentDate = Carbon::now();

        // Data untuk tampilan Hari (berdasarkan jam)
        $todayVisitors = DB::table('visitors')
            ->select(DB::raw('HOUR(created_at) as hour, COUNT(*) as count'))
            ->whereDate('created_at', Carbon::today())
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        // Data untuk tampilan Minggu (berdasarkan hari dalam minggu)
        $weekVisitors = DB::table('visitors')
            ->select(DB::raw('DAYNAME(created_at) as day, COUNT(*) as count'))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('day')
            ->orderBy(DB::raw('FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")'))
            ->get();


        // Data untuk tampilan Bulan (berdasarkan minggu dalam bulan)
        $monthVisitors = DB::table('visitors')
            ->select(DB::raw('WEEK(created_at) - WEEK(DATE_SUB(created_at, INTERVAL DAYOFMONTH(created_at) - 1 DAY)) + 1 as week, COUNT(*) as count'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        $transaksiPending = UserProduk::with('produk', 'user')  // Load relasi produk dan user
            ->where('status_transaksi', 'pending')
            ->get();

        // Mengembalikan view dashboard dengan data yang dibutuhkan
        return view('admin.dashboard', compact('transaksiPending', 'todayVisitors', 'weekVisitors', 'monthVisitors', 'formattedAverageRating', 'userCount', 'totalProducts'));
    }



    public function manajemenAdmin()
    {
        $kat = ['Pengembangan Bisnis', 'Pendampingan Manajemen Bisnis'];

        session(['kategori' => $kat, 'route' => 'manajemen.admin']);

        return view('admin.manajemen-business');
    }

    public function trainingAdmin()
    {
        $kat = ['Pelatihan Calon Tenaga Kerja', 'Pelatihan Tenaga Kerja Aktif'];

        session(['kategori' => $kat, 'route' => 'training.admin']);

        return view('admin.training-center');
    }

    public function digitalAdmin()
    {
        $kat = ['Software/Aplikasi/Website', 'Artificial Intelegence'];

        session(['kategori' => $kat, 'route' => 'digital.admin']);

        return view('admin.digital-solution');
    }

    public function personalAdmin()
    {
        $kat = ['Individu', 'Kelompok'];

        session(['kategori' => $kat, 'route' => 'personal.admin']);

        return view('admin.personal-development');
    }

    public function organizerAdmin()
    {
        $kat = ['MICE & Travel Vacation', 'Wedding & Integrated Event'];

        session(['kategori' => $kat, 'route' => 'organizer.admin']);

        return view('admin.organizer');
    }

    public function konfirmasiTransaksi($id)
    {
        // Ambil transaksi dengan ID yang diberikan
        $userProduk = UserProduk::findOrFail($id);

        // Update status transaksi menjadi confirmed
        $userProduk->status_transaksi = 'confirmed';

        $userProduk->tanggal_beli = now();
        $userProduk->tanggal_berakhir = now()->addDays(30);
        // Set status akses produk menjadi aktif
        $userProduk->status_akses = 'aktif';

        // Simpan perubahan
        $userProduk->save();

        // Redirect ke halaman dashboard admin
        return redirect()->route('admin')->with('success', 'Transaksi telah dikonfirmasi!');
    }

    public function tolakTransaksi($id)
    {
        // Ambil transaksi dengan ID yang diberikan
        $userProduk = UserProduk::findOrFail($id);

        // Update status transaksi menjadi rejected
        $userProduk->status_transaksi = 'rejected';

        // Set status akses produk menjadi nonaktif
        $userProduk->status_akses = 'nonaktif';

        // Simpan perubahan
        $userProduk->save();

        // Redirect ke halaman dashboard admin dengan pesan sukses
        return redirect()->route('admin')->with('success', 'Transaksi telah ditolak!');
    }
}
