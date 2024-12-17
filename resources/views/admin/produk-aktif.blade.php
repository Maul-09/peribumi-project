<x-adminlayout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Active Product List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Active Product List</li>
                </ol>
            </nav>
        </div>

        @if ($errors->any())
            <div class="produk-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="table-container">
            <table class="produk-table">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Nama Produk</th>
                        <th>Status Transaksi</th>
                        <th>Status Akses</th>
                        <th>Nomor Transaksi</th>
                        <th>Tanggal Pembelian</th>
                        <th>Tanggal Berakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produkSemua as $produk)
                        @if ($produk->pivot->status_transaksi === 'confirmed' && $produk->pivot->status_akses === 'aktif')
                            <tr>
                                <td>{{ $produk->nama_user }}</td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>
                                    <span title="Confirmed" style="color: #27ae60;">✔</span>
                                </td>
                                <td>{{ $produk->pivot->status_akses }}</td>
                                <td>{{ $produk->pivot->nomor_transaksi ?? '-' }}</td>
                                <td>{{ $produk->pivot->tanggal_beli ? $produk->pivot->tanggal_beli->format('d-m-Y') : '-' }}
                                </td>
                                <td>{{ $produk->pivot->tanggal_berakhir ? $produk->pivot->tanggal_berakhir->format('d-m-Y') : '-' }}
                                </td>
                                <td>
                                    <form
                                        action="{{ route('produk.nonaktifkan', ['id' => $produk->id, 'nomorTransaksi' => $produk->pivot->nomor_transaksi]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menonaktifkan produk ini?');">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="produk-btn">Nonaktifkan</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</x-adminlayout>
