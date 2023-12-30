<main class="contenedor container-login">
    <h1>Restablecer Contraseña</h1>

    <?php include_once __DIR__ .  '/../templates/alerts.php'; ?>
    <form method="POST" class="form login" action="/recover">
        <fieldset>
            <legend>Ingresa tu E-mail para verificar tu identidad</legend>
            <label for="email">E-mail:</label>
            <input type="email" placeholder="Ingresa tu Email" id="email" name="email" >
            <input type="submit" class="button-form" value="Enviar Instrucciones">
        </fieldset>
    </form>

    <div class="actions">
        <a href="/login">Inicio De Sesión</a>
    </div>
</main>

