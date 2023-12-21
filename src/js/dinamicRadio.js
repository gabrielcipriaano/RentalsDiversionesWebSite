document.addEventListener("DOMContentLoaded", function () {
  selectTypeContactMethod();
});

function selectTypeContactMethod() {
  const methodContact = document.querySelectorAll(
    'input[name="contact[type-contact]"]'
  );
  methodContact.forEach((input) =>
    input.addEventListener("click", showOpcions)
  );
}

function showOpcions(e) {
  const contactDiv = document.querySelector("#contact");
  if (e.target.value == "teléfono") {
    contactDiv.innerHTML = `
    <label for="phone">Teléfono:</label>
    <input type="tel" name="phone" id="phone" placeholder="Ingresa tu numero de teléfono" required>

    <label for="time">Indica tu hora preferida para la llamada:</label>
    <input type="time" name="time" id="time" required>`;
  } else {
    contactDiv.innerHTML = ` 
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Ingresa tu email" required>
    `;
  }
}
