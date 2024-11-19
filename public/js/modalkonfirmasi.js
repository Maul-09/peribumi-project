var modal = document.getElementById("konfirmasiModal");
var btn = document.querySelectorAll(".btn-beli");
var span = document.getElementById("closeModal");
var whatsappLink = document.getElementById("whatsappLink");
var closeModalBtn = document.getElementById("closeModalBtn");

btn.forEach(function(button) {
    button.addEventListener("click", function(event) {
        event.preventDefault();

        var produkNama = button.getAttribute("data-produk-nama");
        var harga = button.getAttribute("data-produk-harga");
        var durasi = button.getAttribute("data-produk-durasi");
        var whatsappUrl = button.getAttribute("data-whatsapp-url");

        document.getElementById("modalProdukNama").innerText = produkNama;
        document.getElementById("modalHarga").innerText = harga;
        document.getElementById("modalDurasi").innerText = durasi;

        whatsappLink.setAttribute("href", whatsappUrl);

        modal.style.display = "block";
    });
});

span.onclick = function() {
    modal.style.display = "none";
}

closeModalBtn.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
