// Ambil elemen modal dan tombol
var modal = document.getElementById("konfirmasiModal");
var btn = document.querySelectorAll(".btn-beli");
var span = document.getElementById("closeModal");
var whatsappLink = document.getElementById("whatsappLink");
var closeModalBtn = document.getElementById("closeModalBtn");  // Tombol Batal

// Loop untuk setiap tombol 'Beli Produk'
btn.forEach(function(button) {
    button.addEventListener("click", function(event) {
        event.preventDefault();  // Mencegah aksi default (redirect)

        var produkNama = button.getAttribute("data-produk-nama");
        var harga = button.getAttribute("data-produk-harga");
        var durasi = button.getAttribute("data-produk-durasi");
        var whatsappUrl = button.getAttribute("data-whatsapp-url");

        // Menampilkan data produk di modal
        document.getElementById("modalProdukNama").innerText = produkNama;
        document.getElementById("modalHarga").innerText = harga;
        document.getElementById("modalDurasi").innerText = durasi;

        // Mengatur link WhatsApp
        whatsappLink.setAttribute("href", whatsappUrl);

        // Menampilkan modal
        modal.style.display = "block";
    });
});

// Ketika tombol close diklik, tutup modal
span.onclick = function() {
    modal.style.display = "none";
}

// Ketika tombol batal diklik, tutup modal
closeModalBtn.onclick = function() {
    modal.style.display = "none";
}

// Ketika pengguna mengklik di luar modal, tutup modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
