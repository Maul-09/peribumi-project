function handleInputFields() {
    document.querySelectorAll('.input-field input').forEach(input => {
        input.addEventListener('input', function () {
            if (this.value.trim() !== '') {
                this.classList.add('has-text');
            } else {
                this.classList.remove('has-text');
            }
        });
    });
}


function handleTogglePassword() {

    const passwordToggle = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#password');
    const passwordEyeIcon = document.querySelector('#eyeIcon');

    if (passwordToggle && passwordInput && passwordEyeIcon) {
        passwordToggle.addEventListener('click', function () {
            const isPasswordVisible = passwordInput.type === 'text';
            passwordInput.type = isPasswordVisible ? 'password' : 'text';
            passwordEyeIcon.classList.toggle('fa-eye', !isPasswordVisible);
            passwordEyeIcon.classList.toggle('fa-eye-slash', isPasswordVisible);
        });
    } else {
        console.warn('Password toggle elements missing');
    }

    const confirmPasswordToggle = document.querySelector('#togglePasswordConfirmation');
    const confirmPasswordInput = document.querySelector('#password_confirmation');
    const confirmPasswordEyeIcon = document.querySelector('#eyeIconConfirmation');

    if (confirmPasswordToggle && confirmPasswordInput && confirmPasswordEyeIcon) {
        confirmPasswordToggle.addEventListener('click', function () {
            const isConfirmPasswordVisible = confirmPasswordInput.type === 'text';
            confirmPasswordInput.type = isConfirmPasswordVisible ? 'password' : 'text';
            confirmPasswordEyeIcon.classList.toggle('fa-eye', !isConfirmPasswordVisible);
            confirmPasswordEyeIcon.classList.toggle('fa-eye-slash', isConfirmPasswordVisible);
        });
    } else {
        console.warn('Confirm password toggle elements missing');
    }
}

// Inisialisasi fungsi setelah DOM dimuat
document.addEventListener('DOMContentLoaded', function () {
    handleInputFields();
    handleTogglePassword();
});




// const sign_in_btn = document.querySelector("#sign-in-btn");
// const sign_up_btn = document.querySelector("#sign-up-btn");
// const container = document.querySelector(".container");

// sign_up_btn.addEventListener("click", () => {
//   container.classList.add("sign-up-mode");
// });

// sign_in_btn.addEventListener("click", () => {
//   container.classList.remove("sign-up-mode");
// });

// function showConfirmation() {
//     const confirmationMessage = document.getElementById('confirmationMessage');
//     confirmationMessage.style.display = 'block';
//     setTimeout(() => {
//         confirmationMessage.style.display = 'none';
//     }, 3000);
// }

// window.onload = function() {
//     const successMessage = document.querySelector('.success-message');
//     if (successMessage) {
//         successMessage.style.opacity = 1;
//     }
// };

