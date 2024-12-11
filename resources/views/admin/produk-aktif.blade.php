<x-adminlayout>
    <main id="main" class="main">
        <h3>Produk Aktif</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Pengguna</th>
                    <th>Nama Produk</th>
                    <th>Status Transaksi</th>
                    <th>Status Akses</th>
                    <th>Nomor Transaksi</th>
                    <th>Tanggal Pembelian</th>
                    <th>Tanggal Berakhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produkSemua as $produk)
                    @if ($produk->status_transaksi === 'Confirmed' && $produk->status_akses === 'Aktif')
                        <tr>
                            <td>{{ $produk->nama_user }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td class="text-center">
                                @if ($produk->status_transaksi === 'Confirmed')
                                <span class="icon" title="Confirmed">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="green" viewBox="0 0 24 24">
                                        <path d="M10 15.172l-3.586-3.586-1.414 1.414L10 18 19 9l-1.414-1.414z"></path>
                                    </svg>
                                </span>
                                @endif
                            </td>
                            <td>{{ $produk->status_akses }}</td>
                            <td>{{ $produk->pivot->nomor_transaksi ?? '-' }}</td>
                            <td>
                                {{ $produk->pivot && $produk->pivot->tanggal_beli ? $produk->pivot->tanggal_beli->format('d-m-Y') : '-' }}
                            </td>
                            <td>
                                {{ $produk->pivot && $produk->pivot->tanggal_berakhir ? $produk->pivot->tanggal_berakhir->format('d-m-Y') : '-' }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </main>
</x-adminlayout>
