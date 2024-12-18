// Ambil elemen-elemen modal dan tombol
var modal = document.getElementById("konfirmasiModal");
var btn = document.querySelectorAll(".btn-beli");
var span = document.getElementById("closeModal");
var whatsappLink = document.getElementById("whatsappLink");
var closeModalBtn = document.getElementById("closeModalBtn");
var form = document.getElementById("konfirmasiModalForm")

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
    event.preventDefault();
    var whatsappUrl = whatsappLink.getAttribute("href");
    // Ambil data dari input tanggal mulai
    var tanggalMulai = document.getElementById('tanggalMulai').value;

    if(tanggalMulai){
        var inputTanggalMulai = document.createElement('input');
        inputTanggalMulai.type = 'hidden';
        inputTanggalMulai.name = 'tanggal_mulai';
        inputTanggalMulai.value = tanggalMulai;
        inputTanggalMulai.required = true;

        // Tambahkan elemen input ke form
        form.appendChild(inputTanggalMulai); // Menambahkan input tanggal ke dalam form
        
        // Mengirimkan form
        form.submit();
        window.open(whatsappUrl, "_blank");

    }else{
        alert('Tanggal mulai wajib diisi!');
        return;
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
