<main class="contenedor page-contact">
    <h1 class="page-contact__title">¡Hablemos de Diversión! Contacta con Nosotros</h1>

    <div class="form-container">
        <div class="contact-socials">
            <h2 class="contact-socials__title">
                Información de contacto
            </h2>
            <p class="contact-socials__message">
                Contáctanos por redes sociales,
                llamada o llena el formulario y te responderemos
            </p>

            <a href="/linktofacebook" class="contact-socials__item">
                <picture class="contact-socials__img">
                    <source srcset="/build/img/facebook.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/facebook.png" width="100" height="100" alt="icono facebook">
                </picture>
                <h2 class="contact-socials__label">@Rental's y Diversiones</h2>
            </a>
            <a href="/linktowhatsapp" class="contact-socials__item">
                <picture class="contact-socials__img">
                    <source srcset="/build/img/whatsapp.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/whatsapp.png" width="100" height="100" alt="icono whatsapp">
                </picture>
                <h2 class="contact-socials__label">1234567890</h2>
            </a>
            <a href="tel:+1234567890" class="contact-socials__item">
                <picture class="contact-socials__img">
                    <source srcset="/build/img/telefono.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/telefono.png" width="100" height="100" alt="icono teléfono">
                </picture>
                <h2 class="contact-socials__label">Llámanos</h2>
            </a>
        </div>

        <form class="form" action="/contact" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="name">Nombre:</label>
                <input type="text" placeholder="Tu Nombre" id="nameContact" name="contact[name]" required>

                <label for="name">Mensaje:</label>
                <textarea id="message" name="contact[message]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de Contacto</legend>

                <p>¿Cómo desea ser contactado?</p>
                <pre></pre>

                <div class="type-contact">
                    <label for="phone-contact">Teléfono</label>
                    <input name="contact[type-contact]" type="radio" value="teléfono" id="phone-contact" required>

                    <label for="email-contact">E-mail</label>
                    <input name="contact[type-contact]" type="radio" value="email" id="email-contact" required>
                </div>
                <pre></pre>
                <div id="contact">
                </div>



            </fieldset>

            <input type="submit" value="Enviar" class="button-form">
        </form>
    </div>



</main>