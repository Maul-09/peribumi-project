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

function closePopup() {
    document.getElementById("alertPopup").style.display = "none";
}

window.onload = function() {
    setTimeout(closePopup, 3000);
};

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
    const toggle = document.querySelector(".toggle");
    const menu = document.querySelector(".menu");
    const menuLinks = document.querySelectorAll(".menu a");

    const toggleMenu = () => {
        menu.classList.toggle("active");
    };

    if (toggle && !toggle.querySelector("i")) {
        const burgerIcon = document.createElement("i");
        burgerIcon.className = "fas fa-bars";
        toggle.appendChild(burgerIcon);
    }

    if (toggle) {
        toggle.addEventListener("click", toggleMenu);
    }

    menuLinks.forEach((link) => {
        link.addEventListener("click", () => {
            menu.classList.remove("active");
        });
    });

    const updateToggleVisibility = () => {
        if (window.innerWidth <= 768) {

            toggle.style.display = "block";
        } else {

            toggle.style.display = "none";
            menu.classList.remove("active");
        }
    };

    updateToggleVisibility();

    window.addEventListener("resize", updateToggleVisibility);
});

document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector('.cards-container');
    const cardWidth = 215; // Sesuaikan dengan lebar card (plus gap jika ada)
    let scrollAmount = 0;

    function smoothScroll() {
        if (scrollAmount >= container.scrollWidth - container.clientWidth) {
            scrollAmount = 0; // Kembali ke awal jika sudah di ujung
        } else {
            scrollAmount += cardWidth; // Geser sejauh lebar card
        }

        // Animasi smooth dengan requestAnimationFrame
        let start = container.scrollLeft;
        let change = scrollAmount - start;
        let duration = 500; // Durasi animasi (ms)
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

    // Interval untuk scroll otomatis
    setInterval(smoothScroll, 3000); // Scroll setiap 3 detik
});







