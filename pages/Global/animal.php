<?php include '../Commons/header.php'; ?>

<?= styleTitreNiveau1("Odin", COLOR_TITRE_PENSIONNAIRES) ?>

<div class="row border border-dark rounded-3 m-2 align-items-center perso_bgVert">
    <div class="col p-2 center">
        <img src="../../sources/images/animaux/Chats/Odin/Odin.jpg" class="img-thumbnail" alt="Framboise" style="max-height: 180px">
    </div>
    <div class="col-2 col-md-1 border-start border-end text-center border-dark">
        <img src="../../sources/images/Autres/icones/chienOk.png" class="img-fluid m-1" alt="Framboise" style="width: 50px">
        <img src="../../sources/images/Autres/icones/chatOk.png" class="img-fluid m-1" alt="Framboise" style="width: 50px">
        <img src="../../sources/images/Autres/icones/babyOk.png" class="img-fluid m-1" alt="Framboise" style="width: 50px">
    </div>
    <div class="col-6 col-md-4 text-center">
        <div class="perso_policeTitre perso_Size20 mb-3">Puce : XXXXXXXXXXXX</div>
        <div class="mb-2">Née le : 01/01/2000</div>
        <div class="">
            <span class="badge bg-warning m-1 p-2 ">douce</span>
            <span class="badge bg-warning m-1 p-2 ">calme</span>
            <span class="badge bg-warning m-1 p-2 ">joueuse</span>
        </div>
    </div>
    <div class="col-12 col-md-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br />
        Architecto ea unde reiciendis soluta, quasi adipisci qui atque <br />
        aliquid quisquam nisi fuga voluptas aperiam praesentium cupiditate nihil saepe aspernatur eaque odio.
    </div>
</div>

<div class="row g-0 align-items-center">
    <div class="col-12 col-lg-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-dark" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <img src="../../sources/images/animaux/Chats/Odin/Odin2.jpg" class="img-thumbnail" style="height:500px;" alt="Odin">
                </div>
                <div class="carousel-item">
                    <img src="../../sources/images/animaux/Chats/Odin/Odin3.jpg" class="img-thumbnail" style="height:500px;" alt="Odin">
                </div>
                <div class="carousel-item">
                    <img src="../../sources/images/animaux/Chats/Odin/Odin4.jpg" class="img-thumbnail" style="height:500px;" alt="Odin">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="">
            <?= styleTitreNiveau2("Qui suis-je ?", COLOR_TITRE_PENSIONNAIRES) ?>
            <p>
                <img src="../../sources/images/Autres/icones/IconeAdopt.png" alt="" width="50" height="50" class="d-block mx-auto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque temporibus, autem, incidunt fugiat, voluptates ipsa doloribus voluptatibus natus quia quas vel.
            </p>
            <hr/>
            <p>
                <img src="../../sources/images/Autres/icones/oeil.jpg" alt="" width="50" height="50" class="d-block mx-auto">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit porro dolor at distinctio. Cum, voluptatibus soluta, nobis debitis quasi voluptatem ut earum inventore laboriosam saepe, odit reprehenderit. Fuga, ipsam cum?
            </p>
            <hr/>
            <p>
                <img src="../../sources/images/Autres/icones/iconeContrat.png" alt="" width="50" height="50" class="d-block mx-auto">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur debitis facere molestiae cum aut repudiandae odit excepturi, officiis aliquam modi. Ratione molestiae maxime, id aliquam harum pariatur eaque voluptate architecto?
            </p>
        </div>
    </div>
</div>



<?php include '../Commons/footer.php'; ?>