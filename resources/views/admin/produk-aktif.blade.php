<x-adminlayout>
    <main id="main" class="main">
    <h3>Produk Aktif</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Nama Produk</th>
                <th>Status</th>
                <th>Nomor Transaksi</th>
                <th>Tanggal Pembelian</th>
                <th>Tanggal Berakhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produkAktif as $produk)
                <tr>
                    <td>{{ $produk->nama_user }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->status_transaksi }}</td>
                    <td>{{ $produk->pivot->nomor_transaksi ?? '-' }}</td>
                    <td>
                        {{ $produk->pivot && $produk->pivot->tanggal_beli ? $produk->pivot->tanggal_beli->format('d-m-Y') : '-' }}
                    </td>
                    <td>
                        {{ $produk->pivot && $produk->pivot->tanggal_berakhir ? $produk->pivot->tanggal_berakhir->format('d-m-Y') : '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
</x-adminlayout>
