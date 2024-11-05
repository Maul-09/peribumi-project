window.addEventListener('scroll', function() {
    var header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 0);
});

const button = document.getElementById('dropdownButton');
const menu = document.getElementById('dropdownMenu');
button.addEventListener('click', () => {
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});

window.addEventListener('click', (event) => {
    if (!button.contains(event.target) && !menu.contains(event.target)) {
        menu.style.display = 'none';
    }
});

function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

let silabusCount = 0;

    function addSilabus() {
        silabusCount++;
        let silabusContainer = document.getElementById("silabus-container");

        let silabusHTML = `
            <div class="silabus mt-3" id="silabus-${silabusCount}">
                <h4>Silabus ${silabusCount}</h4>
                <div class="form-group">
                    <label for="judul_silabus_${silabusCount}">Judul Silabus:</label>
                    <input type="text" name="silabus[${silabusCount}][judul]" id="judul_silabus_${silabusCount}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi_silabus_${silabusCount}">Deskripsi Silabus:</label>
                    <textarea name="silabus[${silabusCount}][deskripsi]" id="deskripsi_silabus_${silabusCount}" class="form-control" required></textarea>
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
            <div class="isi-silabus mt-2">
                <div class="form-group">
                    <label for="judul_isi_${silabusIndex}_${isiCount}">Judul Isi Silabus:</label>
                    <input type="text" name="silabus[${silabusIndex}][isi_silabus][${isiCount}][judul_isi]" id="judul_isi_${silabusIndex}_${isiCount}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="konten_${silabusIndex}_${isiCount}">Konten:</label>
                    <textarea name="silabus[${silabusIndex}][isi_silabus][${isiCount}][konten]" id="konten_${silabusIndex}_${isiCount}" class="form-control" required></textarea>
                </div>
            </div>
        `;

        isiContainer.insertAdjacentHTML("beforeend", isiHTML);
    }
