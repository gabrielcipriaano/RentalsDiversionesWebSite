document.addEventListener("DOMContentLoaded", function () {
  conditionalSubmit();
});

function conditionalSubmit() {
  const deleteButtons = document.querySelectorAll(".deleteButton");
  console.log(deleteButtons);
  deleteButtons.forEach((deleteButton) =>
    deleteButton.addEventListener("click", function (event) {
      event.preventDefault();
      const form = deleteButton.closest("form");

      Swal.fire({
        title: "¿Estás seguro de que deseas eliminar el brincolín?",
        text: "No podrás revertir esta acción",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    })
  );
}
