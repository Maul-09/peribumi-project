let silabusCount = 0;

function addSilabus() {
    silabusCount++;
    let silabusContainer = document.getElementById("silabus-container");

    let silabusHTML = `
        <div class="silabus mt-2" id="silabus-${silabusCount}">
            <div class="form-group" id="silabus-arrow" >
                <label for="judul_silabus_${silabusCount}">Judul Silabus:</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="silabus[${silabusCount}][judul]" id="judul_silabus_${silabusCount}" class="form-control" required>
                    <button type="button" class="btn btn-danger btn-sm mb-3" onclick="deleteSilabus(${silabusCount})" style="margin-left: 8px; margin-top:15px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>

            <!-- Bagian Isi Silabus -->
            <div class="isi-silabus-container" id="isi-silabus-container-${silabusCount}">
                <button type="button" class="btn btn-secondary" onclick="addIsiSilabus(${silabusCount})">Tambah Isi Silabus</button>
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
