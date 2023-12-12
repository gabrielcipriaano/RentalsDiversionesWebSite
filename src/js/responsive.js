document.addEventListener("DOMContentLoaded", function () {
  responsive();
});

function responsive() {
  const menuButton = document.querySelector(".menu-icon");

  menuButton.addEventListener("click", function () {
    const navegation = document.querySelector(".menu-nav");
    navegation.classList.toggle("show");
  });
}
