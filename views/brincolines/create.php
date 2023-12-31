<main class="contenedor">
    <a href="/admin-brincolines" class="admin-button w-10 m-t-5">
        Volver</a>
    <h1 class="admin__title">Crear Nuevo Brincolin</h1>

    <section class="container-flex-center">
        <?php include_once __DIR__ .  '/../templates/alerts.php'; ?>

        <form action="/admin-brincolines/create" class="form" enctype="multipart/form-data">
            <?php include_once 'form.php'; ?>
            <input type="submit" class="button-form" value="Crear">
        </form>
    </section>


</main>