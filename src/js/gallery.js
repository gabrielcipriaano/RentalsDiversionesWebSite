const mainPhoto = document.querySelector(".main-photo");
const secondaryPhotos = document.querySelectorAll(".secondary-photo");
document.addEventListener("DOMContentLoaded", function () {
  dinamicGallery();
});

function dinamicGallery() {
  secondaryPhotos.forEach(function (secondaryPhoto) {
    let newSrc = secondaryPhoto.src;
    secondaryPhoto.addEventListener("click", function () {
      changeImage(newSrc);
      removeClassFromAllPhotos();
      secondaryPhoto.classList.toggle("selected-photo");
    });
  });
}

function changeImage(newSrc) {
  mainPhoto.src = newSrc;
}

function removeClassFromAllPhotos() {
  secondaryPhotos.forEach((photo) => photo.classList.remove("selected-photo"));
}
