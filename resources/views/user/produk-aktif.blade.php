<!-- resources/views/profile.blade.php -->

<h3>Produk yang sudah Anda beli:</h3>

<table class="table">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Status Akses</th>
            <th>Tanggal Pembelian</th>
            <th>Tanggal Berakhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produkDibeli as $produk)
            <tr>
                <td>{{ $produk->nama_produk }}</td>
                <td>
                    @if ($produk->pivot->tanggal_berakhir && $produk->pivot->tanggal_berakhir->isPast())
                        Nonaktif
                    @else
                        Aktif
                    @endif
                </td>
                <td>
                    {{ $produk->pivot->tanggal_beli ? $produk->pivot->tanggal_beli->format('d-m-Y') : 'Tidak Tersedia' }}
                </td>
                <td>
                    {{ $produk->pivot->tanggal_berakhir ? $produk->pivot->tanggal_berakhir->format('d-m-Y') : 'Tidak Tersedia' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


