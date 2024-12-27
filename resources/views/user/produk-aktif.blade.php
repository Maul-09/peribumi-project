<x-layout :ShowNavbar="false" :ShowFooter="false">
    <x-slot:name>Product</x-slot>
    <x-slot:title>{{ asset('css/user-style/produk-aktif.css') }}</x-slot>
    <div class="tab-pane" id="product">
        <h3>Produk Anda:</h3>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Status Transaksi</th>
                    <th>Status Akses</th> <!-- Tambahkan kolom Status Akses -->
                    <th>Nomor Transaksi</th>
                    <th>Tanggal Pembelian</th>
                    <th>Tanggal Berakhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @forelse ($produkDibeli as $produk)
            <tbody>
                <tr>
                    <td data-label="Nama Produk">{{ $produk->nama_produk }}</td>
                    <td data-label="Status Transaksi">
                        @if ($produk->status_transaksi === 'Confirmed')
                            <span class="icon" title="Confirmed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="green"
                                    viewBox="0 0 24 24">
                                    <path d="M10 15.172l-3.586-3.586-1.414 1.414L10 18 19 9l-1.414-1.414z">
                                    </path>
                                </svg>
                            </span>
                            <span class="stat-transaksi">Confirmed</span>
                        @elseif ($produk->status_transaksi === 'Pending')
                            <span class="icon" title="Pending">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#FFA500"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm1-7h4v2h-6V7h2v6z">
                                    </path>
                                </svg>
                            </span>
                            <span class="stat-transaksi">Pending</span>
                        @elseif ($produk->status_transaksi === 'Rejected')
                            <span class="icon" title="Rejected">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="red"
                                    viewBox="0 0 24 24">
                                    <path d="M6 18L18 6M6 6l12 12" stroke="red" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="stat-transaksi">Rejected</span>
                        @endif
                    </td>
                    <td data-label="Status Akses">{{ $produk->pivot->status_akses }}</td>
                    <td data-label="Nomor Transaksi">{{ $produk->nomor_transaksi }}</td>
                    <td data-label="Tanggal Pembelian">{{ $produk->pivot->tanggal_beli ? $produk->pivot->tanggal_beli->format('d-m-Y') : '-' }}
                    </td>
                    <td data-label="Tanggal Berakhir">{{ $produk->pivot->tanggal_berakhir ? $produk->pivot->tanggal_berakhir->format('d-m-Y') : '-' }}
                    </td>
                    <td data-label="Aksi">
                        @if ($produk->pivot->status_transaksi === 'pending')
                            <form
                                action="{{ route('cancel.transaction', ['produkId' => $produk->id, 'userId' => Auth::id()]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Cancel</button>
                            </form>
                        @elseif ($produk->pivot->status_transaksi === 'rejected')
                            <!-- Tombol Delete hanya muncul ketika status transaksi adalah "Rejected" -->
                            <form
                                action="{{ route('cancel.transaction', ['produkId' => $produk->id, 'userId' => Auth::id()]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @elseif ($produk->pivot->status_transaksi === 'confirmed' && $produk->pivot->status_akses === 'nonaktif')
                            <!-- Tombol Delete muncul ketika status transaksi adalah "Confirmed" dan status akses "Nonaktif" -->
                            <form
                                action="{{ route('cancel.transaction', ['produkId' => $produk->id, 'userId' => Auth::id()]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @else
                            <span>-</span>
                        @endif
                    </td>
                </tr>
            </tbody>
            @empty
                <tr>
                    <td colspan="7" id="empty">
                        <h4 class="empty-text">Tidak ada produk aktif saat ini. Ayo beli produk kamu sekarang!</h4>
                        <a href="{{ route('beranda') }}#anchor-produk" class="btn-empty">Cari Produk</a>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</x-layout>
