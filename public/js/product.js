function Dropdown(header) {
    const content = header.nextElementSibling;
    const icon = header.querySelector('.silabus-toggle i');

    if (content.classList.contains('open')) {
        content.classList.remove('open');
        content.style.maxHeight = null;
        icon.style.transform = 'rotate(0deg)';
    } else {
        document.querySelectorAll('.silabus-content.open').forEach((openContent) => {
            openContent.classList.remove('open');
            openContent.style.maxHeight = null;
            const otherIcon = openContent.previousElementSibling.querySelector('.silabus-toggle i');
            if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
        });

        content.classList.add('open');
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.style.transform = 'rotate(180deg)';
    }
}

const tabLinks = document.querySelectorAll('.tab-link');
const tabPanes = document.querySelectorAll('.tab-pane');

tabLinks.forEach((tabLink) => {
    tabLink.addEventListener('click', (event) => {
        event.preventDefault();
        console.log('Tab clicked:', tabLink);
        console.log('Target ID:', tabLink.getAttribute('data-target'));

        tabLinks.forEach((link) => link.classList.remove('active'));
        tabPanes.forEach((pane) => pane.classList.remove('active'));

        const targetId = tabLink.getAttribute('data-target');
        const targetPane = document.getElementById(targetId);

        if (targetPane) {
            tabLink.classList.add('active');
            targetPane.classList.add('active');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('file-input');
    const deleteIcon = document.querySelector('.delete-icon');
    const imgElement = document.querySelector('.photo-container img');
    const placeholder = document.querySelector('.photo-placeholder');
    const hiddenInput = document.getElementById('image-deleted');

    const alertContainer = document.querySelector('.custom-alert');
    const alertMessage = document.querySelector('.custom-alert .alert-message');
    const alertConfirm = document.querySelector('.custom-alert .alert-confirm');
    const alertCancel = document.querySelector('.custom-alert .alert-cancel');
    const saveButton = document.getElementById('btn-save');

    function showAlert(message, confirmCallback = null) {
        if (alertContainer && alertMessage) {
            alertMessage.textContent = message;
            alertContainer.style.display = 'flex';

            const confirmHandler = function () {
                if (confirmCallback) confirmCallback();
                closeAlert();
                alertConfirm.removeEventListener('click', confirmHandler);
            };
            alertConfirm.addEventListener('click', confirmHandler);

            alertCancel.addEventListener('click', closeAlert);
        }
    }

    function closeAlert() {
        if (alertContainer) alertContainer.style.display = 'none';
    }

    if (fileInput) {
        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                if (!file.type.startsWith('image/')) {
                    alert('Harap unggah file berupa gambar.');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    if (placeholder) {
                        placeholder.style.display = 'none';
                    }

                    if (imgElement) {
                        imgElement.src = e.target.result;
                        imgElement.style.display = 'block';
                    } else {
                        const newImg = document.createElement('img');
                        newImg.src = e.target.result;
                        newImg.alt = 'Profile Image';
                        newImg.className = 'profile-photo';
                        document.querySelector('.photo-container').prepend(newImg);
                    }

                    if (hiddenInput) {
                        hiddenInput.value = '0';
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }

});
