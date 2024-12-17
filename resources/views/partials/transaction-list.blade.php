@foreach ($transaksiPending as $transaksi)
    <tr>
        <td>
            {{-- Highlight nama produk jika diperlukan --}}
            {{ $transaksi->produk->nama_produk }}
        </td>
        <td>
            {{-- Highlight nama pengguna --}}
            {!! isset($query)
                ? preg_replace("/($query)/i", "<span class='highlight'>$1</span>", $transaksi->user->name)
                : $transaksi->user->name !!}
        </td>
        <td>{{ $transaksi->status_transaksi }}</td>
        <td>
            <form action="{{ route('admin.konfirmasi', $transaksi->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-success">Konfirmasi</button>
            </form>

            <form action="{{ route('admin.tolak', $transaksi->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
        </td>
    </tr>
@endforeach
