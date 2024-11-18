function toggleDropdown(header) {
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

