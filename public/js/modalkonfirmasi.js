// Ambil elemen-elemen modal dan tombol
var modal = document.getElementById("konfirmasiModal");
var btn = document.querySelectorAll(".btn-beli");
var span = document.getElementById("closeModal");
var whatsappLink = document.getElementById("whatsappLink");
var closeModalBtn = document.getElementById("closeModalBtn");

// Event listener untuk setiap tombol "Beli Produk"
btn.forEach(function (button) {
    button.addEventListener("click", function (event) {
        event.preventDefault();

        // Ambil data dari tombol yang memicu modal
        var produkNama = button.getAttribute("data-produk-nama");
        var harga = button.getAttribute("data-produk-harga");
        var durasi = button.getAttribute("data-produk-durasi");
        var whatsappUrl = button.getAttribute("data-whatsapp-url");

        // Isi data ke dalam modal
        document.getElementById("modalProdukNama").innerText = produkNama;
        document.getElementById("modalHarga").innerText = harga;
        document.getElementById("modalDurasi").innerText = durasi;

        // Salin data WhatsApp URL ke tombol di modal
        whatsappLink.setAttribute("href", whatsappUrl);

        // Tampilkan modal
        modal.style.display = "block";
    });
});

// Event listener untuk tombol WhatsApp di modal
whatsappLink.addEventListener("click", function (event) {
    event.preventDefault(); // Cegah tindakan default sementara waktu

    // Ambil data URL WhatsApp dan daftar produk
    var whatsappUrl = whatsappLink.getAttribute("href");
    var daftarUrl = whatsappLink.getAttribute("data-daftar-url");

    // Buka URL WhatsApp di tab baru
    if (whatsappUrl) {
        window.open(whatsappUrl, "_blank");
    }

    // Redirect ke halaman daftar produk
    if (daftarUrl) {
        window.location.href = daftarUrl;
    } else {
        // Jika data-daftar-url tidak tersedia, gunakan fallback
        window.location.href = "/daftar-produk";
    }
});

// Event listener untuk menutup modal saat tombol "X" diklik
span.onclick = function () {
    modal.style.display = "none";
};

// Event listener untuk tombol "Batal" di modal
closeModalBtn.onclick = function () {
    modal.style.display = "none";
};

// Event listener untuk menutup modal jika klik di luar modal
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};
