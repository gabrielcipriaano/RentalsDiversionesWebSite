document.addEventListener("DOMContentLoaded", function () {
  togglePasswordVisibility();
});

function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const togglePasswordButton = document.getElementById("togglePassword");

  togglePasswordButton.addEventListener("click", function () {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      togglePasswordButton.textContent = "Ocultar";
    } else {
      passwordInput.type = "password";
      togglePasswordButton.textContent = "Mostrar";
    }
  });
}
