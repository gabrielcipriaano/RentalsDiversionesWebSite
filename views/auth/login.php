<main class="contenedor container-login">
    <h1>Login</h1>

    <?php include_once __DIR__ .  '/../templates/alerts.php'; ?>
    <form method="POST" class="form login" action="/login">
        <fieldset>
            <legend>E-mail y Password</legend>


            <label for="email">E-mail:</label>
            <input type="email" placeholder="Ingresa tu Email" id="email" name="email" >
            <div class="password-container">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingresa Contraseña">
                <span id="togglePassword">Mostrar</span>
            </div>
            <input type="submit" class="button-form" value="Iniciar Sesión">


        </fieldset>
    </form>

    <div class="actions">
        <a href="/recover">¿Olvidaste tu Contraseña ?</a>
    </div>
</main>

<script src="/build/js/showPassword.js"></script>