<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            //     'durasi_lembaga' => 'required|string|max:1000',
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
            //     'durasi_lembaga' => $request->input('durasi_lembaga'),
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
                    'nama_produk' => 'required|string|max:255',
                    'teknis' => 'required|string|max:255',
                    'deskripsi' => 'required|string',
                    'durasi' => 'required|string|max:255',
                    'personil' => 'required|string|max:255',
                    'persyaratan' => 'required|string',
                    'metodologi' => 'required|string',
                    'sasaran' => 'required|string',
                    'jadwal_lokasi_fasilitas' => 'required|string',
                    'deskripsi_harga' => 'required|string',
                    'highlight_harga' => 'required|string',
                    'produkType' => 'required|string',
                    'link' => 'nullable|url',
                ]);

                // Simpan data form1 ke database
                $produk = Produk::create($request->only([
                    'nama_produk', 'teknis', 'deskripsi', 'durasi', 'personil',
                    'persyaratan', 'metodologi', 'sasaran', 'jadwal_lokasi_fasilitas',
                    'deskripsi_harga', 'highlight_harga', 'produkType', 'link'
                ]));
            }

            if ($formIdentifier === 'form2') {
                // Validasi untuk form2
                $request->validate([
                    'nama_produk' => 'required|string|max:255',
                    'jenis_pekerjaan' => 'required|string',
                    'kualifikasi' => 'required|string',
                    'ruang_lingkup' => 'required|string',
                    'klasifikasi' => 'required|string',
                    'durasi_lembaga' => 'required|string',
                    'kategori' => 'required|string',
                    'deskripsi_harga' => 'required|string',
                    'highlight_harga' => 'required|string',
                    'produkType' => 'required|string',
                    'link' => 'nullable|url',
                ]);

                // Simpan data form2 ke database
                $produk = Produk::create($request->only([
                    'nama_produk', 'jenis_pekerjaan', 'kualifikasi', 'ruang_lingkup',
                    'klasifikasi', 'durasi_lembaga', 'kategori', 'deskripsi_harga',
                    'highlight_harga', 'produkType', 'link'
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
            'deskripsi_harga',
            'highlight_harga',
            'jenis_pekerjaan',
            'kualifikasi',
            'ruang_lingkup',
            'klasifikasi',
            'kategori'
        ];
        $filteredProduct = array_filter($product->toArray(), function ($value, $key) {
            // Hanya ambil yang tidak null dan bukan 'id', 'created_at', atau 'updated_at'
            return !is_null($value) && !in_array($key, ['id', 'created_at', 'updated_at', 'produkType','nama_produk', 'image', 'link']);
        }, ARRAY_FILTER_USE_BOTH);

        $produk = Produk::findOrFail($id);

        return view('user.index', ['product' => $filteredProduct], compact('produk', 'specialKeys'));
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
        //     'durasi_lembaga' => 'required|string|max:1000',
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
                $request->validate([
                    'nama_produk' => 'required|string|max:255',
                    'teknis' => 'required|string|max:255',
                    'deskripsi' => 'required|string',
                    'durasi' => 'required|string|max:255',
                    'personil' => 'required|string|max:255',
                    'persyaratan' => 'required|string',
                    'metodologi' => 'required|string',
                    'sasaran' => 'required|string',
                    'jadwal_lokasi_fasilitas' => 'required|string',
                    'deskripsi_harga' => 'required|string',
                    'highlight_harga' => 'required|string',
                    'produkType' => 'required|string',
                    'link' => 'nullable|url',
                ]);
                $produk = Produk::findOrFail($id);
                // Simpan data form2 ke database
                $produk->update($request->all());
            }

            if ($formIdentifier === 'form2') {
                // Validasi untuk form2
                $request->validate([
                    'nama_produk' => 'required|string|max:255',
                    'jenis_pekerjaan' => 'required|string',
                    'kualifikasi' => 'required|string',
                    'ruang_lingkup' => 'required|string',
                    'klasifikasi' => 'required|string',
                    'durasi_lembaga' => 'required|string',
                    'kategori' => 'required|string',
                    'deskripsi_harga' => 'required|string',
                    'highlight_harga' => 'required|string',
                    'produkType' => 'required|string',
                    'link' => 'nullable|url',
                ]);
                $produk = Produk::findOrFail($id);
                // Simpan data form2 ke database
                $produk->update($request->all());
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

    public function konfirmasiPembelian($id)
    {
        $produk = Produk::findOrFail($id);
        $user = Auth::user();

        // Cek apakah produk sudah dibeli
        $userProduk = UserProduk::where('user_id', $user->id)
            ->where('produk_id', $produk->id)
            ->first();

        if (!$userProduk) {
            // Jika belum dibeli, buat transaksi baru
            $userProduk = new UserProduk();
            $userProduk->user_id = $user->id;
            $userProduk->produk_id = $produk->id;
            $userProduk->status_transaksi = 'pending';  // Status pending
            $userProduk->save();
        } else {
            // Jika sudah ada, update status menjadi pending
            $userProduk->status_transaksi = 'pending';  // Status pending
            $userProduk->save();
        }

        // Redirect ke WhatsApp
        $whatsappMessage = "Hallo, saya ingin membeli produk: " . $produk->nama_produk;
        $whatsappUrl = "https://wa.me/6281586839469?text=" . urlencode($whatsappMessage);

        return redirect($whatsappUrl);
    }

    public function produkAktif()
    {
        $produkDibeli = Auth::user()->produk;

        foreach ($produkDibeli as $produk) {
            $produk->pivot->tanggal_beli = Carbon::parse($produk->pivot->tanggal_beli);
            $produk->pivot->tanggal_berakhir = Carbon::parse($produk->pivot->tanggal_berakhir);
        }
        return view('user.produk-aktif', compact('produkDibeli'));
    }
}
