<fieldset>
    <legend>Información del Brincolin</legend>

    <label for="name">Nombre:</label>
    <input type="text" placeholder="Ingresa el nombre" id="name" name="name" required>

    <label for="description">Descripción:</label>
    <textarea placeholder="Ingresa un breve descripción" id="description" name="description" required></textarea>

    <label for="capacidad">Capacity:</label>
    <input type="number" placeholder="Capacidad del brincolin" id="capacity" name="capacity" required>

    <label for="length">Longitud:</label>
    <input type="text" placeholder="Largo del brincolin en metros (Eje: 1,2) " id="length" name="length" pattern="[0-9]+(\.[0-9]{1,2})?" required>

    <label for="height">Altura:</label>
    <input type="text" placeholder="Altura del brincolin en metros (Eje: 1,2)" id="height" name="height" pattern="[0-9]+(\.[0-9]{1,2})?" required>

    <label for="width">Ancho:</label>
    <input type="text" placeholder="Ancho del brincolin en metros (Eje: 1,2)" id="width" name="width" pattern="[0-9]+(\.[0-9]{1,2})?" required>

</fieldset>

<fieldset>
    <legend>Fotos</legend>

    <label for="photo1">Foto 1:</label>
    <input type="file" id="photo1" name="photo1" accept=".jpg, .png" required>

    <label for="photo2">Foto 2:</label>
    <input type="file" id="photo2" name="photo2" accept=".jpg, .png" required>
    
    <label for="photo3">Foto 3:</label>
    <input type="file" id="photo3" name="photo3" accept=".jpg, .png" required>

    <label for="photo4">Foto 4:</label>
    <input type="file" id="photo4" name="photo4" accept=".jpg, .png" required>

    
</fieldset>

