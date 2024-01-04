<section class="contenedor">
    <h2>Brincolines Únicos para Eventos Inolvidables</h2>
    
    <div class="container-adds">
        <?php foreach ($brincolines as $brincolin) : ?>
            <div class="add">
                <picture class="add__img">
                    <source srcset="/uploads/<?php echo $brincolin->photo1;?>" type="image/webp">
                    <img loading="lazy" src="/uploads/<?php echo $brincolin->photo1;?>" alt="imagen brincolin" width="500" height="500" class="add__img-src">
                </picture>

                <div class="add-content">
                    <h3 class="add__name">
                    <?php echo $brincolin->name;?>
                    </h3>

                    <p class="add__description">
                        <?php echo $brincolin->description;?>
                    </p>

                    <a href="/brincolin?id=<?php echo $brincolin->id;?>" class="add__button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M12 9h.01" />
                            <path d="M11 12h1v4h1" />
                        </svg>
                        Ver Brincolín

                    </a>
                </div>

            </div>

        <?php endforeach; ?>

    </div>
    <?php if ($main) : ?>
        <div class="right">
            <a href="/brincolines" class="botton">
                Ver Todos Los Brincolínes
            </a>
        </div>
    <?php endif; ?>
</section>