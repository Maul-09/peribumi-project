let silabusCount = 0;

function addSilabus(item = {}, index = null) {
    silabusCount = index !== null ? index + 1 : silabusCount + 1;
    let silabusContainer = document.getElementById("silabus-container");

    let silabusHTML = `
        <div class="silabus mt-2" id="silabus-${silabusCount}">
            <div class="form-group" id="silabus-arrow">
                <label for="judul_silabus_${silabusCount}">Judul Silabus:</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="silabus[${silabusCount}][judul]" id="judul_silabus_${silabusCount}" class="form-control" value="${item.judul || ''}" required>
                    <button type="button" class="btn btn-danger btn-sm mb-3" onclick="deleteSilabus(${silabusCount})" style="margin-left: 8px; margin-top:15px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>

            <!-- Bagian Isi Silabus -->
            <div class="isi-silabus-container" id="isi-silabus-container-${silabusCount}">
                <button type="button" class="btn btn-secondary" onclick="addIsiSilabus(${silabusCount})">Tambah Isi Silabus</button>
                ${(item.isi_silabus || []).map((isi, idx) => `
                    <div class="isi-silabus mt-2" id="isi-silabus-${silabusCount}-${idx + 1}">
                        <div class="form-group" id="silabus-arrow-2">
                            <label for="judul_isi_${silabusCount}_${idx + 1}">Judul Isi Silabus:</label>
                            <div style="display: flex; align-items: center;">
                                <input type="text" name="silabus[${silabusCount}][isi_silabus][${idx + 1}][judul_isi]" id="judul_isi_${silabusCount}_${idx + 1}" class="form-control" value="${isi.judul_isi || ''}" required>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteIsiSilabus(${silabusCount}, ${idx + 1})" style="margin-left: 8px;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>
    `;

    silabusContainer.insertAdjacentHTML("beforeend", silabusHTML);
}

function addIsiSilabus(silabusIndex) {
    let isiContainer = document.getElementById(`isi-silabus-container-${silabusIndex}`);
    let isiCount = isiContainer.querySelectorAll(".isi-silabus").length + 1;

    let isiHTML = `
        <div class="isi-silabus mt-2" id="isi-silabus-${silabusIndex}-${isiCount}">
            <div class="form-group" id="silabus-arrow-2">
                <label for="judul_isi_${silabusIndex}_${isiCount}">Judul Isi Silabus:</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="silabus[${silabusIndex}][isi_silabus][${isiCount}][judul_isi]" id="judul_isi_${silabusIndex}_${isiCount}" class="form-control" required>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteIsiSilabus(${silabusIndex}, ${isiCount})" style="margin-left: 8px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    `;

    isiContainer.insertAdjacentHTML("beforeend", isiHTML);
}

function deleteSilabus(silabusIndex) {
    let silabusElement = document.getElementById(`silabus-${silabusIndex}`);
    if (silabusElement) {
        silabusElement.remove();
    }
}

function deleteIsiSilabus(silabusIndex, isiIndex) {
    let isiElement = document.getElementById(`isi-silabus-${silabusIndex}-${isiIndex}`);
    if (isiElement) {
        isiElement.remove();
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Periksa apakah ada data silabus yang sudah ada
    if (typeof existingSilabus !== 'undefined' && existingSilabus.length > 0) {
        existingSilabus.forEach(function(item, index) {
            addSilabus(item, index);
        });
    }
});


function deleteIsiSilabus(silabusIndex, isiIndex) {
    const isiElement = document.getElementById(`isi-silabus-${silabusIndex}-${isiIndex}`);
    if (isiElement) {
        isiElement.remove();
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const silabusContainer = document.getElementById("silabus-container");

    if (!silabusContainer) {
        console.error("Silabus container tidak ditemukan di halaman.");
        return;
    }

    const tambahSilabusButton = document.getElementById("btn-tambah-silabus");
    if (tambahSilabusButton) {
        tambahSilabusButton.addEventListener("click", addSilabus);
    }
});


function showPopup(form) {
    console.log("Popup triggered");
    const popup = document.getElementById('delete-popup');
    if (popup) {
        popup.style.display = 'flex';
    } else {
        console.error("Popup element not found");
    }

    const confirmButton = document.getElementById('confirm-delete');
    confirmButton.onclick = function () {
        form.submit();
        closePopup();
    };

    const cancelButton = document.getElementById('cancel-delete');
    cancelButton.onclick = function () {
        closePopup();
    };
}

function closePopup() {
    const popup = document.getElementById('delete-popup');
    if (popup) {
        popup.style.display = 'none';
    }
}

document.getElementById("form-id").addEventListener("submit", function(event) {
    const silabusContainer = document.getElementById("silabus-container");
    const form = event.target; // Form yang sedang dikirimkan

    // Pindahkan silabusContainer ke dalam form jika belum ada di dalamnya
    if (!form.contains(silabusContainer)) {
        form.appendChild(silabusContainer);
    }
});


