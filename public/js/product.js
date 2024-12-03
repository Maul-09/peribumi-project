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
    const photoContainer = document.querySelector('.photo-container');
    const hiddenDeleteInput = document.getElementById('image-deleted');

    if (fileInput) {
        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                if (!file.type.startsWith('image/')) {
                    alert('Please upload a valid image file.');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    let img = document.querySelector('.photo-container img');
                    if (img) {
                        img.src = e.target.result;
                        hiddenDeleteInput.value = '0';
                    } else {
                        const placeholder = document.querySelector('.photo-placeholder');
                        if (placeholder) placeholder.remove();

                        img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Profile Image';
                        img.className = 'profile-photo';
                        photoContainer.prepend(img);
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    } else {
        console.error('Element with ID "file-input" not found.');
    }

    if (deleteIcon) {
        deleteIcon.addEventListener('click', function () {
            const confirmation = confirm('Are you sure you want to delete this photo?');
            if (confirmation) {
                const img = document.querySelector('.photo-container img');
                if (img) {
                    img.remove();
                }


                const placeholder = document.querySelector('.photo-placeholder');
                if (!placeholder) {
                    const newPlaceholder = document.createElement('div');
                    newPlaceholder.className = 'photo-placeholder';

                    const initial = document.createElement('span');
                    initial.className = 'initial';
                    initial.textContent = '{{ strtoupper($initial) }}';

                    newPlaceholder.appendChild(initial);
                    photoContainer.prepend(newPlaceholder);
                }

                hiddenDeleteInput.value = '1';
                fileInput.value = '';
            }
        });
    } else {
        console.error('Delete icon element not found.');
    }
});






