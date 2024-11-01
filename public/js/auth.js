const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

function showConfirmation() {
    const confirmationMessage = document.getElementById('confirmationMessage');
    confirmationMessage.style.display = 'block';
    setTimeout(() => {
        confirmationMessage.style.display = 'none';
    }, 3000);
}

document.addEventListener("DOMContentLoaded", function() {
    const toggleButtons = document.querySelectorAll(".toggle-password");

    toggleButtons.forEach(button => {
        button.addEventListener("click", function() {
            const passwordInput = this.previousElementSibling;
            const eyeIcon = this.querySelector("i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        });
    });
});

