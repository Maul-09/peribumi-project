<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Visit;
use App\Models\Produk;
use App\Models\Visitor;
use Illuminate\View\View;
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

        $usersByType = [
            'user' => User::where('usertype', 'user')->get(),
        ];

        $totalProducts = Produk::count();

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

        $products = Produk::all();

        $productsWithRatings = Produk::with('reviewRatings')->get()->map(function ($produk) {
            // Menghitung rata-rata rating untuk produk tersebut
            $averageRating = $produk->reviewRatings->avg('star_rating'); // Menghitung rata-rata rating
            return [
                'nama_produk' => $produk->nama_produk,
                'average_rating' => $averageRating ? number_format($averageRating, 2) : '0.00', // Format 2 angka desimal
                'ratings' => $produk->reviewRatings, // Semua review terkait produk ini
            ];
        });

        // Menghitung rata-rata global untuk semua rating di tabel ReviewRating
        $globalAverageRating = ReviewRating::average('star_rating');
        $formattedGlobalAverageRating = number_format($globalAverageRating, 2);


        $jumlahTransaksiPending = UserProduk::where('status_transaksi', 'pending')->count();

        // Mengembalikan view dashboard dengan data yang dibutuhkan
        return view('admin.dashboard', compact('jumlahTransaksiPending', 'usersByType', 'products', 'transaksiPending', 'todayVisitors', 'weekVisitors', 'monthVisitors', 'productsWithRatings', 'formattedGlobalAverageRating', 'userCount', 'totalProducts'));
    }



    public function manajemenAdmin()
    {
        $kat = ['Pengembangan (Inkubasi) Bisnis', 'Pendampingan Manajemen Bisnis'];

        session(['kategori' => $kat, 'route' => 'manajemen.admin', 'formNumber' => '2']);

        return view('admin.manajemen-business');
    }

    public function trainingAdmin()
    {
        $kat = ['Pelatihan Calon Tenaga Kerja', 'Pelatihan Tenaga Kerja (Profesi)'];

        session(['kategori' => $kat, 'route' => 'training.admin', 'formNumber' => '1']);

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

    public function profileAdmin(string $id): View
    {
        $user = User::findOrFail($id);
        return view('admin.profile-admin', compact('user'));
    }
}
