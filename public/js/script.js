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



document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.rate label i');
    const inputs = document.querySelectorAll('.rate input');

    inputs.forEach((input, index) => {
        input.addEventListener('change', () => {
            stars.forEach((star, idx) => {
                star.classList.toggle('fa-solid', idx <= index);
                star.classList.toggle('fa-regular', idx > index);
            });
        });
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector('.cards-container');
    const cardWidth = 215;
    let scrollAmount = 0;
    let isManualScrolling = false;

    function smoothScroll() {
        if (isManualScrolling) return;

        const maxScroll = container.scrollWidth - container.clientWidth;

        if (scrollAmount >= maxScroll) {
            scrollAmount = 0;
        } else {
            scrollAmount += cardWidth;
        }


        let start = container.scrollLeft;
        let change = scrollAmount - start;
        let duration = 1500;
        let startTime = null;

        function animateScroll(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = easeInOutQuad(timeElapsed, start, change, duration);
            container.scrollLeft = run;

            if (timeElapsed < duration) requestAnimationFrame(animateScroll);
        }

        function easeInOutQuad(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animateScroll);
    }

    function updateScrollAmount() {
        // Hitung posisi terdekat ke card terdekat
        const scrollPosition = container.scrollLeft;
        scrollAmount = Math.round(scrollPosition / cardWidth) * cardWidth;
    }

    // Deteksi aktivitas scroll manual
    container.addEventListener('scroll', function () {
        isManualScrolling = true;
        clearTimeout(container.manualScrollTimeout);

        // Setelah selesai scroll manual, reset flag
        container.manualScrollTimeout = setTimeout(function () {
            isManualScrolling = false;
            updateScrollAmount(); // Perbarui scrollAmount ke posisi terdekat
        }, 300); // Delay untuk deteksi akhir scroll manual
    });

    // Interval untuk scroll otomatis
    setInterval(smoothScroll, 5000);
});










