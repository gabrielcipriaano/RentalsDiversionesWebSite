<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental's y Diversiones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;700;900&display=swap" rel="stylesheet">
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
            <div class="menu-icon" id="menuIcon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l16 0" />
                    <path d="M4 18l16 0" />
                </svg>
            </div>

            <div class="menu-nav">
                <a href="/gallery">Galeria</a>
                <a href="/contact">Contacto</a>
                <a href="/about">Nosotros</a>
                <a href="/logout">Cerrar Sesion</a>
            </div>

        </nav>
    </header>

    <?php echo $content; ?>
    <?php $script .= "<script src='/build/js/modernizr.js'></script>"; ?>
    <?php $script .= "<script src='/build/js/responsive.js'></script>"; ?>
    <?php echo $script ?? ''; ?>

</body>


</html>