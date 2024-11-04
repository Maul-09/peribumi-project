<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Silabus;
use App\Models\IsiSilabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('silabus.isiSilabus')->get();
        return view('index', compact('produk'));
    }

    public function create()
    {
        return view('produk');
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
            $request->validate([
                'nama_produk' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'apa_yang_dipelajari'=> 'nullable|string',
                'benefit'=>'nullable|string',
                'harga'=>'required|integer',
                'silabus' => 'array',
                'silabus.*.judul' => 'required|string|max:255',
                'silabus.*.deskripsi' => 'nullable|string',
                'silabus.*.isi_silabus' => 'array',
                'silabus.*.isi_silabus.*.judul_isi' => 'required|string|max:255',
                'silabus.*.isi_silabus.*.konten' => 'nullable|string',
            ]);

            // Simpan data produk
            $produk = Produk::create([
                'nama_produk' => $request->input('nama_produk'),
                'deskripsi' => $request->input('deskripsi')
            ]);

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
                        'konten' => $isiData['konten'],
                    ]);
                }
            }

            // Commit transaksi jika semua data tersimpan dengan sukses
            DB::commit();

            return redirect()->route('produk.index')->with('success', 'Produk dan silabus berhasil disimpan.');
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
        $produk = Produk::findOrFail($id);

        // Return the view with the product data
        return view('show', compact('produk'));
    }
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}

