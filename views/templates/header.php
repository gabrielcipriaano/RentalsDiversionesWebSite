<header class="header">

    <a href="/" class="logo">
        <picture>
            <source srcset="/build/img/logo.webp" type="image/webp">
            <img loading="lazy" src="/build/img/logo.jpg" width="100" height="100" alt="Logo Rental's y Diversiones">
        </picture>
    </a>

    <nav class="navegation">
        <div class="menu-nav">
            <a href="/brincolines">Brincolínes</a>
            <a href="/furnitures">Mobilirario</a>
            <a href="/contact">Contacto</a>
            <a href="/about">Nosotros</a>
        </div>

        <?php if ($_SESSION['login']) : ?>

            <a class="logout" href="/logout">
                Cerrar Sesión
            </a>
        <?php endif; ?>
    </nav>
</header>