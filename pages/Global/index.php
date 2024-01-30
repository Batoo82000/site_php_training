<?php include '../Commons/header.php'; ?>
<?= styleTitreNiveau1("Ils ont besoin de vous !", "perso_ColorRoseMenu") ?>
<!-- section carousel -->
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>

    </div>
    <div class="carousel-inner">
        <!-- Début d'un item -->
        <div class="carousel-item active">
            <div class="row g-0 border rounded overflow-hidden mb-4 perso_bgRose">
                <div class="col-12 col-md-auto text-center">
                    <img src="../../sources/images/animaux/Chats/Framboise/Framboise.jpg" alt="Framboise" style='height:250px'>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="perso_ColorRoseMenu perso_policeTitre perso_textShadow">Framboise</h3>
                    <div class="text-muted mb-1">02/2019</div>
                    <p class="mb-auto">
                        Description de Framboise
                    </p>
                    <a href="" class="btn btn-primary">
                        Visitez ma page
                    </a>
                </div>
            </div>
        </div>
        <!-- Fin d'un item -->
        <!-- Début d'un item -->
        <div class="carousel-item">
            <div class="row g-0 border rounded overflow-hidden mb-4 perso_bgRose">
                <div class="col-12 col-md-auto text-center">
                    <img src="../../sources/images/animaux/Chats/Framboise/Framboise.jpg" alt="Framboise" style='height:250px'>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="perso_ColorRoseMenu perso_policeTitre perso_textShadow">Framboise</h3>
                    <div class="text-muted mb-1">02/2019</div>
                    <p class="mb-auto">
                        Description de Framboise
                    </p>
                    <a href="" class="btn btn-primary">
                        Visitez ma page
                    </a>
                </div>
            </div>
        </div>

        <!-- Fin d'un item -->
    </div>
</div>
<!-- section carousel -->

<div class="row">
    <div class="col-6 mt-3">
        <?php
        $txt = "<img src='../../sources/images/Autres/icones/journal.png' alt='logo news'>
        Nouvelles des adoptés";
        echo styleTitreNiveau2($txt, COLOR_TITRE_ACTUS) ?>
    </div>
    <div class="col-6 mt-3">
    <?php
        $txt = "<img src='../../sources/images/Autres/icones/action.png' alt='logo news'>
        Evènements et actions";
        echo styleTitreNiveau2($txt, COLOR_TITRE_PENSIONNAIRES) ?>
    </div>
</div>

<div class="row">

    <div class="col-6">
        <div class="row g-0 border rounded mb-4">
            <div class="col-auto d-none d-lg-block">
                <img src="../../sources/images/animaux/Chats/Framboise/Framboise.jpg" alt="Framboise" style='height:150px'>
            </div>
            <div class="col p-3 d-flex flex-column position-static perso_bgVert">
                <h3 class="mb-0 perso_ColorVertMenu perso_textShadow perso_policeTitre">Doyenne Chipie</h3>
                <p class="perso_Size12 mt-2">Description de Chipie</p>
                <a href="" class="btn btn-primary">
                    Visitez ma page
                </a>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="row g-0 border rounded mb-4">
            <div class="col-auto d-none d-lg-block">
                <img src="../../sources/images/animaux/Chats/Framboise/Framboise.jpg " alt="Framboise" style='height:150px'>
            </div>
            <div class="col p-3 d-flex flex-column position-static perso_bgOrange">
                <h3 class="mb-0 perso_ColorOrangeMenu perso_textShadow perso_policeTitre">Doyenne Chipie</h3>
                <p class="perso_Size12 mt-2">Description de Chipie</p>
                <a href="" class="btn btn-primary">
                    Visitez ma page
                </a>
            </div>
        </div>
    </div>


    <?php include '../Commons/footer.php'; ?>