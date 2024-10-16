
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.nav-tabs li');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(tab => tab.classList.remove('active'));
            // Add active class to clicked tab
            tab.classList.add('active');

            // Show corresponding tab pane and hide others
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
