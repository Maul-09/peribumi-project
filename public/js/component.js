let silabusCount = 0;

function addSilabus() {
    silabusCount++;
    const silabusContainer = document.getElementById("silabus-container");

    const silabusHTML = `
        <div class="silabus mt-3" id="silabus-${silabusCount}">
            <div class="form-group">
                <label for="judul_silabus_${silabusCount}">Judul Silabus:</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="silabus[${silabusCount}][judul]" id="judul_silabus_${silabusCount}" class="form-control" required>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteSilabus(${silabusCount})" style="margin-left: 8px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
            <div class="isi-silabus-container mt-3" id="isi-silabus-container-${silabusCount}">
                <button type="button" class="btn btn-secondary mt-2" onclick="addIsiSilabus(${silabusCount})">Tambah Isi Silabus</button>
            </div>
        </div>
    `;

    silabusContainer.insertAdjacentHTML("beforeend", silabusHTML);
}

function addIsiSilabus(silabusIndex) {
    const isiContainer = document.getElementById(`isi-silabus-container-${silabusIndex}`);
    const isiCount = isiContainer.querySelectorAll(".isi-silabus").length + 1;

    const isiHTML = `
        <div class="isi-silabus mt-2" id="isi-silabus-${silabusIndex}-${isiCount}">
            <div class="form-group">
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
    const silabusElement = document.getElementById(`silabus-${silabusIndex}`);
    if (silabusElement) {
        silabusElement.remove();
    }
}

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




