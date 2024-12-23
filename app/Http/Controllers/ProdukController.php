<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Produk;
use App\Models\Silabus;
use App\Models\IsiSilabus;
use App\Models\UserProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{

    public function create()
    {
        $kategori = session('kategori', []);
        $formNumber = session(('formNumber'));
        return view('admin.produk', compact('kategori', 'formNumber'));
    }

    /**
     * Store a new product along with its syllabi and syllabus contents.
     */
    public function store(Request $request)
    {
        // Mulai transaksi untuk memastikan semua data tersimpan dengan benar
        DB::beginTransaction();

        try {
            // Validasi input data
            // $request->validate([
            //     'nama_produk' => 'required|string|max:255',
            //     'teknis' => 'required|string|max:255',
            //     'deskripsi' => 'nullable|string',
            //     'durasi' => 'required|string|max:255',
            //     'personil' => 'required|string|max:255',
            //     'sasaran' => 'required|string|max:1000',
            //     'jenis_pekerjaan' => 'required|string|max:1000',
            //     'kualifikasi' => 'required|string|max:1000',
            //     'ruang_lingkup' => 'required|string|max:1000',
            //     'klasifikasi' => 'required|string|max:1000',
            //     'lembaga' => 'required|string|max:1000',
            //     'kategori' => 'required|string|max:1000',
            //     'persyaratan' => 'required|string|max:255',
            //     'metodologi' => 'required|string|max:255',
            //     'jadwal_lokasi_fasilitas' => 'required|string|max:255',
            //     'deskripsi_harga' => 'required|string|max:1000',
            //     'highlight_harga' => 'required|string|max:255',
            //     'produkType' => 'required|string|max:255',
            //     'link' => 'nullable|string|max:1000',
            //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            //     'silabus' => 'array',
            //     'silabus.*.judul' => 'required|string|max:255',
            //     'silabus.*.isi_silabus' => 'array',
            //     'silabus.*.isi_silabus.*.judul_isi' => 'required|string|max:255',
            // ]);

            // // Simpan data produk tanpa gambar terlebih dahulu
            // $produk = Produk::create([
            //     'nama_produk' => $request->input('nama_produk'),
            //     'teknis' => $request->input('teknis'),
            //     'deskripsi' => $request->input('deskripsi'),
            //     'durasi' => $request->input('durasi'),
            //     'personil' => $request->input('personil'),
            //     'sasaran' => $request->input('sasaran'),
            //     'jenis_pekerjaan' => $request->input('jenis_pekerjaan'),
            //     'kualifikasi' => $request->input('kualifikasi'),
            //     'ruang_lingkup' => $request->input('ruang_lingkup'),
            //     'klasifikasi' => $request->input('klasifikasi'),
            //     'lembaga' => $request->input('lembaga'),
            //     'kategori' => $request->input('kategori'),
            //     'persyaratan' => $request->input('persyaratan'),
            //     'metodologi' => $request->input('metodologi'),
            //     'jadwal_lokasi_fasilitas' => $request->input('jadwal_lokasi_fasilitas'),
            //     'desc_harga' => $request->input('desc_harga'),
            //     'hl_harga' => $request->input('hl_harga'),
            //     'produkType' => $request->input('produkType'),
            //     'link' => $request->input('link'),
            // ]);
            $formIdentifier = $request->input('form_identifier');

            if ($formIdentifier === 'form1') {
                // Validasi untuk form1
                $request->validate([
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
                    'nama_produk' => 'required|string|max:255',
                    'teknis' => 'required|string|max:65535',
                    'deskripsi' => 'required|string',
                    'durasi' => 'required|integer|max:10',
                    'personil' => 'required|string|max:65535',
                    'persyaratan' => 'required|string|max:65535',
                    'metodologi' => 'required|string|max:65535',
                    'sasaran' => 'required|string|max:65535',
                    'jadwal_lokasi_fasilitas' => 'required|string|max:65535',
                    'highlight' => 'required|string|max:65535',
                    'harga' => 'required|string|max:65535',
                    'produkType' => 'required|string',
                    'link' => 'nullable|url',
                ]);

                // Simpan data form1 ke database
                $produk = Produk::create($request->only([
                    'nama_produk',
                    'teknis',
                    'deskripsi',
                    'durasi',
                    'personil',
                    'persyaratan',
                    'metodologi',
                    'sasaran',
                    'jadwal_lokasi_fasilitas',
                    'highlight',
                    'harga',
                    'produkType',
                    'link'
                ]));
            }

            if ($formIdentifier === 'form2') {
                // Validasi untuk form2
                $request->validate([
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
                    'nama_produk' => 'required|string|max:255',
                    'teknis' => 'required|string|max:65535',
                    'deskripsi' => 'required|string',
                    'klasifikasi' => 'required|string|max:65535',
                    'ruang_lingkup' => 'required|string|max:65535',
                    'durasi' => 'integer|string|max:65535',
                    'persyaratan' => 'required|string|max:65535',
                    'tahapan' => 'required|string|max:65535',
                    'harga' => 'required|string|max:65535',
                    'produkType' => 'required|string',
                    'link' => 'nullable|url',
                ]);

                // Simpan data form2 ke database
                $produk = Produk::create($request->only([
                    'nama_produk',
                    'teknis',
                    'deskripsi',
                    'ruang_lingkup',
                    'klasifikasi',
                    'durasi',
                    'persyaratan',
                    'tahapan',
                    'harga',
                    'produkType',
                    'link'
                ]));
            }

            // Jika ada file gambar yang diunggah
            if ($request->hasFile('image')) {
                $destinationPath = public_path('produk');

                // Buat folder jika belum ada
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                // Pindahkan file dan simpan pathnya
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move($destinationPath, $fileName);
                $produk->image = 'produk/' . $fileName; // Simpan path gambar ke database
                $produk->save(); // Simpan perubahan
            } else {
                $produk->image = 'produk/default.jpg'; // Gambar default jika tidak ada yang di-upload
                $produk->save();
            }

            // Simpan data silabus
            foreach ($request->input('silabus', []) as $silabusData) {
                $silabus = Silabus::create([
                    'produk_id' => $produk->id,
                    'judul' => $silabusData['judul'],
                ]);

                // Simpan data isi silabus
                foreach ($silabusData['isi_silabus'] ?? [] as $isiData) {
                    IsiSilabus::create([
                        'silabus_id' => $silabus->id,
                        'judul_isi' => $isiData['judul_isi'],
                    ]);
                }
            }

            // Commit transaksi jika semua data tersimpan dengan sukses
            DB::commit();

            $route = session('route');

            return redirect()->route($route)->with('success', 'Produk dan silabus berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            // Log kesalahan untuk debugging
            Log::error('Error saving product and syllabus: ' . $e->getMessage());
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Retrieve the product by ID
        $product = Produk::findOrFail($id);

        // $deschr = Produk::find($id)->desc_harga;

        // $persyaratan = Produk::find($id)->persyaratan;

        // Return the view with the product data
        $specialKeys = [
            'persyaratan',
            'sasaran',
            'jadwal_lokasi_fasilitas',
            'highlight',
            'harga',
            'jenis_pekerjaan',
            'kualifikasi',
            'lembaga',
            'ruang_lingkup',
            'klasifikasi',
            'kategori',
            'tahapan',
        ];

        $filteredProduct = array_filter($product->toArray(), function ($value, $key) {
            // Hanya ambil yang tidak null dan bukan 'id', 'created_at', atau 'updated_at'
            return !is_null($value) && !in_array($key, ['id', 'created_at', 'updated_at', 'produkType', 'nama_produk', 'image', 'link']);
        }, ARRAY_FILTER_USE_BOTH);

        $customOrder = [
            'nama_produk',
            'teknis',
            'image',
            'deskripsi',
            'personil',
            'sasaran',
            'jenis_pekerjaan',
            'kualifikasi',
            'klasifikasi',
            'ruang_lingkup',
            'kategori',
            'persyaratan',
            'metodologi',
            'sasaran',
            'jadwal_lokasi_fasilitas',
            'lembaga',
            'highlight',
            'harga',
            'tahapan',
        ];

        // Atur urutan berdasarkan yang diinginkan dan pastikan kolom dengan nilai null tidak muncul
        $orderedProduct = [];
        foreach ($customOrder as $column) {
            if (isset($filteredProduct[$column])) {
                $orderedProduct[$column] = $filteredProduct[$column];
            }
        }

        $produk = Produk::findOrFail($id);

        $userProduk = $produk->users()
            ->wherePivot('produk_id', $id)
            ->first();

        return view('user.index', ['product' => $orderedProduct], compact('produk', 'specialKeys', 'userProduk'));
    }
    public function edit($id)
    {
        $produk = Produk::with('silabus.isiSilabus')->find($id);
        $silabus = $produk->silabus;

        $kategori = session('kategori', []);
        $formNumber = session(('formNumber'));
        return view('admin.edit-produk', compact('produk', 'kategori', 'silabus', 'formNumber'));
    }

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        // Validasi input data
        // $validatedData = $request->validate([
        //     'nama_produk' => 'required|string|max:255',
        //     'teknis' => 'required|string|max:255',
        //     'deskripsi' => 'nullable|string',
        //     'durasi' => 'required|string|max:255',
        //     'personil' => 'required|string|max:255',
        //     'sasaran' => 'required|string|max:1000',
        //     'jenis_pekerjaan' => 'required|string|max:1000',
        //     'kualifikasi' => 'required|string|max:1000',
        //     'ruang_lingkup' => 'required|string|max:1000',
        //     'klasifikasi' => 'required|string|max:1000',
        //     'lembaga' => 'required|string|max:1000',
        //     'kategori' => 'required|string|max:1000',
        //     'persyaratan' => 'required|string|max:255',
        //     'metodologi' => 'required|string|max:255',
        //     'jadwal_lokasi_fasilitas' => 'required|string|max:255',
        //     'deskripsi_harga' => 'required|string|max:1000',
        //     'highlight_harga' => 'required|string|max:255',
        //     'produkType' => 'required|string|max:255',
        //     'link' => 'nullable|string|max:1000',

        //     'silabus' => 'nullable|array',
        //     'silabus.*.judul' => 'required|string|max:255',
        //     'silabus.*.isi_silabus' => 'nullable|array',
        //     'silabus.*.isi_silabus.*.judul_isi' => 'required|string|max:255',
        // ]);

        $formIdentifier = $request->input('form_identifier');

        if ($formIdentifier === 'form1') {
            // Validasi untuk form1
            $produk = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
                'nama_produk' => 'required|string|max:255',
                'teknis' => 'required|string|max:65535',
                'deskripsi' => 'required|string',
                'durasi' => 'required|integer|max:10',
                'personil' => 'required|string|max:65535',
                'persyaratan' => 'required|string|max:65535',
                'metodologi' => 'required|string|max:65535',
                'sasaran' => 'required|string|max:65535',
                'jadwal_lokasi_fasilitas' => 'required|string|max:65535',
                'highlight' => 'required|string|max:65535',
                'harga' => 'required|string|max:65535',
                'produkType' => 'required|string',
                'link' => 'nullable|url',
            ]);
            
            $update = Produk::findOrFail($id);
            if ($request->hasFile('image')) {
                $destinationPath = public_path('produk');

                if ($update->image && $update->image !== 'produk/default.jpg') {
                    $oldImagePath = public_path($update->image);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
    
                // Buat folder jika belum ada
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

    
                // Pindahkan file dan simpan pathnya
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move($destinationPath, $fileName);
                $produk['image'] = 'produk/' . $fileName; // Simpan perubahan
            }
            // Simpan data form2 ke database
            $update->update($produk);
        }

        if ($formIdentifier === 'form2') {
            // Validasi untuk form2
            $produk = $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
                'nama_produk' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'teknis' => 'required|string|max:65535',
                'ruang_lingkup' => 'required|string|max:65535',
                'klasifikasi' => 'required|string|max:65535',
                'durasi' => 'integer|string|max:65535',
                'persyaratan' => 'required|string|max:65535',
                'tahapan' => 'required|string|max:65535',
                'harga' => 'required|string|max:65535',
                'produkType' => 'required|string',
                'link' => 'nullable|url',
            ]);
            
            $update = Produk::findOrFail($id);
            if ($request->hasFile('image')) {
                $destinationPath = public_path('produk');

                if ($update->image && $update->image !== 'produk/default.jpg') {
                    $oldImagePath = public_path($update->image);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }
    
                // Buat folder jika belum ada
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

    
                // Pindahkan file dan simpan pathnya
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move($destinationPath, $fileName);
                $produk['image'] = 'produk/' . $fileName; // Simpan perubahan
            }
            $update->update($produk);
        }

        

        // // Buat array untuk menyimpan ID silabus baru
        // $silabusBaruIDs = [];

        // if (!empty($validatedData['silabus'])) {
        //     foreach ($validatedData['silabus'] as $silabusData) {
        //         $silabus = $produk->silabus()->updateOrCreate(
        //             ['judul' => $silabusData['judul']], // Cari berdasarkan judul
        //             ['judul' => $silabusData['judul']]  // Update atau buat baru
        //         );

        //         // Simpan ID silabus baru
        //         $silabusBaruIDs[] = $silabus->id;

        //         if (!empty($silabusData['isi_silabus'])) {
        //             foreach ($silabusData['isi_silabus'] as $isiSilabusData) {
        //                 $silabus->isiSilabus()->updateOrCreate(
        //                     ['judul_isi' => $isiSilabusData['judul_isi']],
        //                     ['judul_isi' => $isiSilabusData['judul_isi']]
        //                 );
        //             }
        //         }
        //     }
        // }

        // // Hapus silabus yang tidak ada dalam data baru
        // $produk->silabus()->whereNotIn('id', $silabusBaruIDs)->delete();

        $route = session('route');
        return redirect()->route($route)->with('success', 'Produk dan silabus berhasil diperbarui!');
    }




    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Cek apakah file gambar ada dan bukan gambar default
        if ($produk->image && $produk->image !== 'produk/default.jpg' && File::exists(public_path($produk->image))) {
            // Hapus file gambar dari direktori
            File::delete(public_path($produk->image));
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }

    public function konfirmasiPembelian(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $user = Auth::user();
        
        $validated = $request->validate([
            'tanggal_mulai' => 'required|date',
        ]);
        $tanggalMulai = $validated['tanggal_mulai'];

        // Buat transaksi baru tanpa memeriksa apakah produk sudah dibeli
        $userProduk = new UserProduk();
        $userProduk->user_id = $user->id;
        $userProduk->produk_id = $produk->id;
        $userProduk->status_transaksi = 'pending'; // Status pending
        $userProduk->tanggal_mulai = $tanggalMulai; 
        $userProduk->save();

        $route = session('route');
        return redirect()->route($route)->withFragment('produk-layanan')->with('success','Pesanan anda telah terdaftar silahkan lanjutkan konfirmasi via whatsapp');
    }

    public function whatsappBlank($id) {
        $produk = Produk::findOrFail($id);

        $whatsappMessage = "Hallo, saya ingin membeli produk-layanan: " . $produk->nama_produk;
        $whatsappUrl = "https://wa.me/6281224785684?text=" . urlencode($whatsappMessage);

        return redirect($whatsappUrl);        
    }

    public function produkUser($id)
    {
        $field = User::findOrFail($id);
        // Transaksi pending
        $produkDibeli = $field->produk()->withPivot('status_transaksi', 'tanggal_beli', 'tanggal_berakhir', 'nomor_transaksi')->get();

        // Proses data untuk menambah status akses dan tombol jika pending
        foreach ($produkDibeli as $produk) {
            if ($produk->pivot) {
                // Parse tanggal jika ada
                $produk->pivot->tanggal_beli = $produk->pivot->tanggal_beli ? Carbon::parse($produk->pivot->tanggal_beli) : null;
                $produk->pivot->tanggal_berakhir = $produk->pivot->tanggal_berakhir ? Carbon::parse($produk->pivot->tanggal_berakhir) : null;

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
                } else {
                    $produk->status_transaksi = 'Confirmed';
                    $produk->status_akses = 'Aktif';
                }

                $produk->nomor_transaksi = $produk->pivot->nomor_transaksi ?? '-';
            }
        }

        return view('user.produk-aktif', compact('field', 'produkDibeli'));
    }

    public function cancleTransaction($produkId, $userId)
    {
        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($produkId);

        // Cari transaksi spesifik berdasarkan user dan status transaksi yang bisa dibatalkan atau dihapus
        $transaksi = $produk->users()
            ->wherePivot('user_id', $userId)
            ->whereIn('status_transaksi', ['pending', 'rejected', 'confirmed']) // Menambahkan status transaksi yang bisa diproses
            ->orderBy('pivot_created_at', 'desc') // Misalnya ada `created_at` di pivot
            ->first();

        if ($transaksi) {
            // Hapus transaksi spesifik dari tabel pivot
            DB::table('user_produk')
                ->where('produk_id', $produkId)
                ->where('user_id', $userId)
                ->whereIn('status_transaksi', ['pending', 'rejected', 'confirmed']) // Menghapus transaksi dengan status yang valid
                ->limit(1) // Pastikan hanya satu yang dihapus
                ->delete();

            return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Transaksi tidak ditemukan atau status transaksi tidak valid untuk dihapus.');
    }

}
