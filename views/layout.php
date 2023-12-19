<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental's y Diversiones</title>
    <link rel="preload" href="build/css/app.css" as="style"/>
    <link rel="preload" href="build/img/background-header.webp" as="image" />
    <link rel="preload" href="build/img/contact.webp" as="image" />
    <link rel="stylesheet" href="build/css/app.css">
</head>


<body>

    <?php include_once 'templates/header.php'; ?>

    <?php echo $content; ?>
    <?php echo $script ?? ''; ?>

    <?php include_once 'templates/footer.php'; ?>

</body>
</html>