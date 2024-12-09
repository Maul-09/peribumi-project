<!DOCTYPE html>
<html>

<head>
    <title>Konfirmasi Transaksi</title>
</head>

<body>
    <h1>Halo {{ $transaksi->user->name }},</h1>
    <p>Transaksi Anda untuk produk "{{ $transaksi->produk->nama_produk }}" telah dikonfirmasi.</p>
    <p>Terima kasih telah bertransaksi dengan kami.</p>
</body>

</html>
