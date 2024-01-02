<main class="contenedor">
    <a href="/admin" class="admin-button w-10 m-t-5">
        Volver</a>
    <h1 class="admin__title">Brincolines</h1>
    <section class="search-and-add">
        <div class="search-bar">
            <form action="/find" method="post">
                <input name="brincolin" placeholder="Buscar Brincolín...">
                <input type="submit" class="search-button" value="Buscar">
            </form>

        </div>
        <a href="admin-brincolines/create" class="admin-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
            Agregar Nuevo Brincolín</a>
    </section>
    <section class="brincolines">
        <?php include_once __DIR__ . '/../templates/alertsGet.php'; ?>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($brincolines as $brincolin) : ?>
                    <tr>
                        <td class="title"><?php echo $brincolin->name;?></td>
                        <td class="image"><img src="/uploads/<?php echo $brincolin->photo1;?>" alt="Foto de Brincolín"></td>
                        <td class="actions">
                            <a title="Editar" href="/brincolines/create?id=<?php echo $brincolin->id;?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#009988" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </a>

                            <!-- <form action="/brincolines/delete" method="post"> -->

                            <!-- <input type="hidden" name="id" value="<?php echo $brincolin->id;?>" /> -->
                            <button title="Eliminar" class="icon-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                            <!-- </form> -->
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </section>
</main>