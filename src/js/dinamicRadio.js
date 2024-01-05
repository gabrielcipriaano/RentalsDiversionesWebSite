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
    <p>Elija la fecha y la hora para la llamada:</p>
    <label for="phone">Teléfono:</label>
    <input type="tel" name="contact[phone]" id="phone" placeholder="Ingresa tu numero de teléfono" required>

    <label for="fecha">Fecha:</label>
    <input type="date" id="date" name="contact[date] required">

    <label for="time">Indica tu hora preferida para la llamada:</label>
    <input type="time" name="contact[time]" id="time" required>`; 
  } else {
    contactDiv.innerHTML = ` 
    <label for="email">Email</label>
    <input type="email" name="contact[email]" id="email" placeholder="Ingresa tu email" required>
    `;
  }
}
