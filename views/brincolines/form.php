<fieldset>
    <legend>Información del Brincolin</legend>

    <label for="name">Nombre:</label>
    <input type="text" placeholder="Ingresa el nombre" id="name" name="name" value="<?php echo $brincolin->name; ?>">

    <label for="description">Descripción:</label>
    <textarea placeholder="Ingresa un breve descripción" id="description" name="description"><?php echo $brincolin->description; ?></textarea>

    <label for="capacidad">Capacity:</label>
    <input type="number" placeholder="Capacidad del brincolin" id="capacity" name="capacity" value="<?php echo $brincolin->capacity; ?>">

    <label for="length">Longitud:</label>
    <input type="text" placeholder="Largo del brincolin en metros (Eje: 2 o 1.2) " id="length" name="length" pattern="[0-9]+(\.[0-9]{1,2})?" value="<?php echo $brincolin->length; ?>">

    <label for="height">Altura:</label>
    <input type="text" placeholder="Altura del brincolin en metros (Eje: 2 o 1.2)" id="height" name="height" pattern="[0-9]+(\.[0-9]{1,2})?" value="<?php echo $brincolin->height; ?>">

    <label for="width">Ancho:</label>
    <input type="text" placeholder="Ancho del brincolin en metros (Eje: 2 o 1.2)" id="width" name="width" pattern="[0-9]+(\.[0-9]{1,2})?" value="<?php echo $brincolin->width; ?>">

</fieldset>

<fieldset>
    <legend>
        Video
    </legend>

    <label for="video">Link de Video:</label>
    <input type="text" placeholder="eje :https://www.youtube.com/watch?v=T8SspHdfpoM" id="video" name="video"  value="<?php echo $brincolin->video; ?>">
</fieldset>

<fieldset>
    <legend>Fotos</legend>
    <?php if ($brincolin->photo1) { ?>
        <img src="/uploads/<?php echo $brincolin->photo1; ?>" alt="Imagen de brincolin" class="imagen-small">
    <?php } ?>

    <label for="photo1">Foto 1:</label>
    <input type="file" id="photo1" name="photo1" accept=".jpeg, .jpg, .png">

    <?php if ($brincolin->photo2) { ?>
        <img src="/uploads/<?php echo $brincolin->photo2; ?>" alt="Imagen de brincolin" class="imagen-small">
    <?php } ?>
    <label for="photo2">Foto 2:</label>
    <input type="file" id="photo2" name="photo2" accept=".jpeg, .jpg, .png">

    <?php if ($brincolin->photo3) { ?>
        <img src="/uploads/<?php echo $brincolin->photo3; ?>" alt="Imagen de brincolin" class="imagen-small">
    <?php } ?>

    <label for="photo3">Foto 3:</label>
    <input type="file" id="photo3" name="photo3" accept=".jpeg, .jpg, .png">

    <?php if ($brincolin->photo4) { ?>
        <img src="/uploads/<?php echo $brincolin->photo4; ?>" alt="Imagen de brincolin" class="imagen-small">
    <?php } ?>

    <label for="photo4">Foto 4:</label>
    <input type="file" id="photo4" name="photo4" accept=".jpeg, .jpg, .png">


</fieldset>