
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.nav-tabs li');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(tab => tab.classList.remove('active'));
            tab.classList.add('active');
            const target = tab.getAttribute('data-tab');
            tabPanes.forEach(pane => {
                pane.classList.remove('active');
                if (pane.id === target) {
                    pane.classList.add('active');
                }
            });
        });
    });
});


function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const adminProfile = document.getElementById('admin-profile');
    const adminLogoSection = document.querySelector('.admin-logo-section');

    sidebar.classList.toggle('collapsed');


    if (sidebar.classList.contains('collapsed')) {
        adminProfile.style.display = 'none';
        adminLogoSection.style.display = 'none';
    } else {
        adminProfile.style.display = 'block';
        adminLogoSection.style.display = 'block';
    }
}

function toggleDropdown() {
    const dropdownMenu = document.getElementById('userDropdownMenu');
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
}


window.onclick = function(event) {
    const dropdownMenu = document.getElementById('userDropdownMenu');
    const dropdownButton = document.getElementById('userDropdownButton');

    if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
        dropdownMenu.style.display = 'none';
    }
}

function confirmLogout() {
    document.getElementById('logoutModal').style.display = 'block';
}


function closeModal() {
    document.getElementById('logoutModal').style.display = 'none';
}

function performLogout() {
    document.getElementById('logoutForm').submit();
}

window.onload = function() {
    closeModal();
};

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
