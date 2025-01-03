<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Visit;
use App\Models\Produk;
use App\Models\Visitor;
use Illuminate\View\View;
use App\Models\UserProduk;
use Illuminate\Support\Str;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\KonfirmasiTransaksiMail;

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
        $kat = ['Rencana Bisnis', 'Sistem Manajemen Bisnis', 'Inkubasi Bisnis'];

        session(['kategori' => $kat, 'route' => 'manajemen.admin', 'formNumber' => '2']);

        return view('admin.manajemen-business');
    }

    public function trainingAdmin()
    {
        $kat = ['Spesifik (Okupasi)', 'Generik (Klaster)', 'Tematik (Bimtek)'];

        session(['kategori' => $kat, 'route' => 'training.admin', 'formNumber' => '1']);

        return view('admin.training-center');
    }

    public function digitalAdmin()
    {
        $kat = ['Barang Digital', 'Jasa Digital', 'Kecerdasan Buatan (Artificial Intelligence)'];

        session(['kategori' => $kat, 'route' => 'digital.admin', 'formNumber' => '2']);

        return view('admin.digital-solution');
    }

    public function personalAdmin()
    {
        $kat = ['Pembinaan (Coaching)', 'Penyuluhan (Counseling)', 'Pembentukan (Building)'];

        session(['kategori' => $kat, 'route' => 'personal.admin', 'formNumber' => '1']);

        return view('admin.personal-development');
    }

    public function organizerAdmin()
    {
        $kat = ['MICE', 'Vacation', 'Promotion'];

        session(['kategori' => $kat, 'route' => 'organizer.admin', 'formNumber' => '2']);

        return view('admin.organizer');
    }

    public function konfirmasiTransaksi($id)
    {
        // Ambil transaksi dengan ID yang diberikan
        $transaksi = UserProduk::findOrFail($id);
        $tanggalMulai  = Carbon::parse($transaksi->tanggal_mulai);
        $durasi = $transaksi->produk->durasi;

        $nomorTransaksi = 'PBC' . Str::upper(Str::random(10));
        // Update status transaksi menjadi confirmed
        $transaksi->status_transaksi = 'confirmed';
        
        $transaksi->tanggal_beli = now();
        $transaksi->tanggal_berakhir = $tanggalMulai->addDays($durasi);

        // Set status akses produk menjadi aktif
        $transaksi->status_akses = 'aktif';
        $transaksi->nomor_transaksi = $nomorTransaksi;
        // Simpan perubahan
        $transaksi->save();

        // Kirim email ke pengguna
        Mail::to($transaksi->user->email)->send(new KonfirmasiTransaksiMail($transaksi));
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

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User berhasil dihapus.'], 200);
    }

    public function restore($id)
    {
        // Cari user termasuk yang soft-deleted
        $user = User::withTrashed()->findOrFail($id);

        try {
            $user->restore(); // Pulihkan akun
            return response()->json(['message' => 'Akun berhasil dipulihkan.'], 200);
        } catch (\Exception $e) {
            Log::error("Gagal memulihkan akun ID {$id}: " . $e->getMessage());
            return response()->json(['message' => 'Gagal memulihkan akun.'], 500);
        }
    }

    public function settingAkun()
    {
        $admins = User::with('informasiUser')
            ->where('usertype', 'admin')
            ->get();
        return view('admin.acount-setting', ['admins' => $admins]);
    }

    public function addAccount(Request $request)
    {
        $field = $request->validate(
            [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'max:255', 'email', 'unique:users'],
                'username' => ['required', 'max:255'],
                'password' => ['required', 'min:8'],
                'usertype' => ['required', 'string'],

            ],
            [
                'name.required' => 'Nama wajib diisi',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
                'email.required' => 'Email wajib diisi',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah digunakan',
                'username.required' => 'Username wajib diisi',
                'username.max' => 'Username tidak boleh lebih dari 255 karakter',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter',
            ]
        );

        // Enkripsi password
        $field['password'] = bcrypt($field['password']);
        $field['email_verified_at'] = now();
        // Simpan user ke database
        User::create($field);

        return redirect()->back()->with('success', 'Akun berhasil ditambahkan!');
    }

    public function delete($id)
    {
        // Mencari data yang akan dihapus berdasarkan ID
        $admin = User::findOrFail($id);

        // Menghapus data
        $admin->forceDelete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('setting.akun')->with('success', 'Akun Telah dihapus');
    }

    public function produkAktif(): View
    {
        // Ambil semua user
        $users = User::all();

        // Inisialisasi koleksi produk
        $produkSemua = collect();

        foreach ($users as $user) {
            // Ambil produk yang dibeli setiap user
            $produkDibeli = $user->produk;

            foreach ($produkDibeli as $produk) {
                if ($produk->pivot) {
                    $produk->pivot->tanggal_beli = $produk->pivot->tanggal_beli
                        ? Carbon::parse($produk->pivot->tanggal_beli)
                        : null;
                    $produk->pivot->tanggal_berakhir = $produk->pivot->tanggal_berakhir
                        ? Carbon::parse($produk->pivot->tanggal_berakhir)
                        : null;

                    // Tentukan status transaksi dan status akses
                    if ($produk->pivot->status_transaksi === 'pending') {
                        $produk->status_transaksi = 'Pending';
                        $produk->status_akses = 'Nonaktif';
                    } elseif ($produk->pivot->status_transaksi === 'rejected') {
                        $produk->status_transaksi = 'Rejected';
                        $produk->status_akses = 'Nonaktif';
                    } elseif ($produk->pivot->tanggal_berakhir && $produk->pivot->tanggal_berakhir->isPast()) {
                        $produk->status_transaksi = 'Nonaktif';
                        $produk->status_akses = 'Nonaktif';
                    } elseif ($produk->pivot->status_akses === 'nonaktif') {
                        $produk->status_transaksi = 'Confirmed';
                        $produk->status_akses = 'Nonaktif';
                    } else {
                        $produk->status_transaksi = 'Confirmed';
                        $produk->status_akses = 'Aktif';
                    }
                    
                    $produk->pivot->nomor_transaksi = $produk->pivot->nomor_transaksi ?? 'Tidak Tersedia';
                    $produk->nama_user = $user->name;
                }

                // Filter hanya produk dengan status "Confirmed" dan "Aktif"
                if ($produk->status_transaksi === 'Confirmed' && $produk->status_akses === 'Aktif' || $produk->status_transaksi === 'Confirmed' && $produk->status_akses === 'Nonaktif') {
                    $produkSemua->push($produk);
                }
            }
        }

        // Merender tampilan dengan data produk aktif
        return view('admin.produk-aktif', compact('users', 'produkSemua'));
    }


    public function nonaktifkan($id, $nomorTransaksi)
    {
        // Pastikan produk dengan ID tersebut ada
        $produk = Produk::findOrFail($id);

        // Cari produk terkait berdasarkan produk_id, user_id, dan nomor_transaksi
        $pivotEntry = DB::table('user_produk') // Ganti dengan nama tabel pivot Anda
            ->where('produk_id', $id) // ID produk
            ->where('user_id', Auth::user()->id) // UUID user yang sedang login
            ->where('nomor_transaksi', $nomorTransaksi) // Filter berdasarkan nomor transaksi
            ->where('status_akses', 'aktif') // Pastikan status akses masih aktif
            ->first();

        // Jika data ditemukan, update status_akses
        if ($pivotEntry) {
            DB::table('user_produk') // Ganti dengan nama tabel pivot Anda
                ->where('produk_id', $id)
                ->where('user_id', Auth::user()->id)
                ->where('nomor_transaksi', $nomorTransaksi)
                ->update(['status_akses' => 'nonaktif']);

            return redirect()->back()->with('success', 'Produk berhasil dinonaktifkan berdasarkan nomor transaksi.');
        }

        // Jika tidak ada data yang ditemukan, beri pesan error
        return redirect()->back()->with('error', 'Produk atau transaksi tidak ditemukan.');
    }


    public function searchTransaksi(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');

            if (empty($query)) {
                $transaksiPending = UserProduk::where('status_transaksi', 'pending')->get();
            } else {
                $transaksiPending = UserProduk::whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%");
                })->where('status_transaksi', 'pending')->get();
            }

            return response()->json(view('partials.transaction-list', compact('transaksiPending', 'query'))->render());
        }
    }
}
