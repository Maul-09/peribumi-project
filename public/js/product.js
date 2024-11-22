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



document.getElementById('file-input').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {

        if (!file.type.startsWith('image/')) {
            alert('Please upload a valid image file.');
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.querySelector('.photo-container img');
            if (img) {
                img.src = e.target.result;
            } else {
                const placeholder = document.querySelector('.photo-placeholder');
                if (placeholder) placeholder.remove();

                const newImg = document.createElement('img');
                newImg.src = e.target.result;
                newImg.alt = 'Profile Image';
                newImg.className = 'profile-photo';
                document.querySelector('.photo-container').prepend(newImg);
            }
        };
        reader.readAsDataURL(file);
    }
});



