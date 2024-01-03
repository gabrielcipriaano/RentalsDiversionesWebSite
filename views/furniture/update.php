<main class="contenedor">
    <a href="/admin-furniture" class="admin-button w-10 m-t-5">
        Volver</a>
    <h1 class="admin__title">Actualizar Información de Mobiliario</h1>

    <section class="container-flex-center">
        <?php include_once __DIR__ .  '/../templates/alerts.php'; ?>

        <form  class="form" method="POST" enctype="multipart/form-data">
            <?php include_once 'form.php'; ?>
            <input type="submit" class="button-form" value="Guardar Cambios">
        </form>
    </section>


</main>