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


