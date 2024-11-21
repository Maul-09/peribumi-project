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



const fileInput = document.getElementById('file-input');
const previewPhotoContainer = document.querySelector('.photo-container');

fileInput.addEventListener('change', function () {
    const file = this.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {

            let previewPhoto = previewPhotoContainer.querySelector('img');
            if (!previewPhoto) {
                previewPhoto = document.createElement('img');
                previewPhoto.alt = "Profile Image";
                previewPhoto.style.borderRadius = "50%";
                previewPhoto.style.width = "100%";
                previewPhoto.style.height = "100%";
                previewPhotoContainer.innerHTML = "";
                previewPhotoContainer.appendChild(previewPhoto);
            }
            previewPhoto.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        alert('Please upload a valid image file.');
    }
});


