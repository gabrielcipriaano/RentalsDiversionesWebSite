<main class="contenedor brincolin-container">
    <section class="brincolin-details">
        <div class="brincolin-details__card">

            <img class="main-photo" src="/uploads/<?php echo $furniture->photo1;?>" alt="Brincolín 1 - Foto 1">
            <div class="brincolin-details__information">
                <div class="brincolin-details__secondary-photos">
                    <img class="secondary-photo selected-photo" src="/uploads/<?php echo $furniture->photo1;?>" alt="Brincolín 1 - Foto 1">
                    <img class="secondary-photo" src="/uploads/<?php echo $furniture->photo2;?>" alt="Brincolín 1 - Foto 2">
                    <img class="secondary-photo" src="/uploads/<?php echo $furniture->photo3;?>" alt="Brincolín 1 - Foto 3">
                    <img class="secondary-photo" src="/uploads/<?php echo $furniture->photo4;?>" alt="Brincolín 1 - Foto 4">
                </div>

                <div class="brincolin-details__description">
                    <div class="brincolin-details__content">
                        <h1 class="brincolin-details__title"><?php echo $furniture->name;?></h1>
                        <p class="brincolin-content__text"><strong>Descripción:</strong>
                         <br> <?php echo $furniture->description;?></p>
                    </div>

                    <div class="brincolin-details__button">
                        <a href="/contact" class="button-redirect">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-due" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                            ¡Reservar Ahora!
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

<script src="/build/js/gallery.js"></script>