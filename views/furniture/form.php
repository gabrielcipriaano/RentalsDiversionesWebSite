<fieldset>
    <legend>Información del Mobilirario</legend>

    <label for="name">Nombre:</label>
    <input type="text" placeholder="Ingresa el nombre" id="name" name="name" value="<?php echo $furniture->name; ?>">

    <label for="description">Descripción:</label>
    <textarea placeholder="Ingresa un breve descripción" id="description" name="description"><?php echo $furniture->description; ?></textarea>

</fieldset>

<fieldset>
    <legend>Fotos</legend>
    <?php if ($furniture->photo1) { ?>
        <img src="/uploads/<?php echo $furniture->photo1; ?>" alt="Imagen de furniture" class="imagen-small">
    <?php } ?>

    <label for="photo1">Foto 1:</label>
    <input type="file" id="photo1" name="photo1" accept=".jpeg, .jpg, .png">

    <?php if ($furniture->photo2) { ?>
        <img src="/uploads/<?php echo $furniture->photo2; ?>" alt="Imagen de furniture" class="imagen-small">
    <?php } ?>
    <label for="photo2">Foto 2:</label>
    <input type="file" id="photo2" name="photo2" accept=".jpeg, .jpg, .png">

    <?php if ($furniture->photo3) { ?>
        <img src="/uploads/<?php echo $furniture->photo3; ?>" alt="Imagen de furniture" class="imagen-small">
    <?php } ?>

    <label for="photo3">Foto 3:</label>
    <input type="file" id="photo3" name="photo3" accept=".jpeg, .jpg, .png">

    <?php if ($furniture->photo4) { ?>
        <img src="/uploads/<?php echo $furniture->photo4; ?>" alt="Imagen de furniture" class="imagen-small">
    <?php } ?>

    <label for="photo4">Foto 4:</label>
    <input type="file" id="photo4" name="photo4" accept=".jpeg, .jpg, .png">


</fieldset>