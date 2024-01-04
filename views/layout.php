<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental's y Diversiones</title>
    <link rel="preload" href="/build/css/app.css" as="style" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap">
    <?php if ($main) : ?>
        <link rel="preload" href="/build/img/background-header.webp" as="image" />
        <link rel="preload" href="/build/img/contact.webp" as="image" />
    <?php endif; ?>
    <link rel="stylesheet" href="/build/css/app.css">

</head>


<body>

    <?php include_once 'templates/header.php'; ?>

    <?php echo $content; ?>
    <?php echo $script ?? ''; ?>

    <?php include_once 'templates/footer.php'; ?>

</body>

</html>