const mainPhoto=document.querySelector(".main-photo"),secondaryPhotos=document.querySelectorAll(".secondary-photo");function dinamicGallery(){secondaryPhotos.forEach((function(o){let e=o.src;o.addEventListener("click",(function(){changeImage(e),removeClassFromAllPhotos(),o.classList.toggle("selected-photo")}))}))}function changeImage(o){mainPhoto.src=o}function removeClassFromAllPhotos(){secondaryPhotos.forEach(o=>o.classList.remove("selected-photo"))}document.addEventListener("DOMContentLoaded",(function(){dinamicGallery()}));