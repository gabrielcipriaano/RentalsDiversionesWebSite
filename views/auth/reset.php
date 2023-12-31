<main class="contenedor container-login">
    <h1>Restablece Tu Contraseña</h1>

    <?php include_once __DIR__ .  '/../templates/alerts.php'; ?>

    <?php if ($token) : ?>
        <form method="POST" class="form login" action="">
            <fieldset>
                <legend>Ingresa Tu Nueva Contraseña</legend>
                <div class="password-container">
                    <label for="password">Nueva Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Ingresa Contraseña">
                    <span id="togglePassword">Mostrar</span>
                </div>
                <input type="submit" class="button-form" value="Guardar">
            </fieldset>
        </form>
    <?php endif; ?>
    <div class="actions">
        <a href="/login">Inicio De Sesión</a>
    </div>

</main>


<script src="/build/js/showPassword.js"></script>