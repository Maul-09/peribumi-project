
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
