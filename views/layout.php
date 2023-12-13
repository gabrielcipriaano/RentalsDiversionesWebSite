<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental's y Diversiones</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body>

    <header class="header">

        <a href="/" class="logo">
            <picture>
                <source srcset="/build/img/logo.webp" type="image/webp">
                <img src="/build/img/logo.jpg" alt="Logo Rental's y Diversiones">
            </picture>
        </a>

        <nav class="navegation">
            <div class="menu-nav">
                <a href="/gallery">Galeria</a>
                <a href="/contact">Contacto</a>
                <a href="/about">Nosotros</a>
            </div>

            <a class="logout" href="/logout">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                    <path d="M15 12h-12l3 -3" />
                    <path d="M6 15l-3 -3" />
                </svg>
            </a>

        </nav>
    </header>

    <?php echo $content; ?>
    <?php echo $script ?? ''; ?>

</body>

</html>