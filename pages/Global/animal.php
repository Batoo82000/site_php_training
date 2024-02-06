<?php include '../Commons/header.php';
require_once 'pdo.php';

$bdd = connexionPDO();
$req = "
SELECT * 
FROM animal 
where id_animal = :idAnimal";
$stmt = $bdd->prepare($req);
$stmt->bindValue(':idAnimal', $_GET['idAnimal']);
$stmt->execute();
$animal = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();

$stmt = $bdd->prepare('
SELECT i.id_image, libelle_image, url_image, description_image
FROM image i
INNER JOIN contient c on i.id_image = c.id_image
INNER JOIN animal a on a.id_animal = c.id_animal
WHERE a.id_animal= :idAnimal
LIMIT 1
');
$stmt->bindValue(':idAnimal', $animal['id_animal']);
$stmt->execute();
$image = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();

$stmt = $bdd->prepare('
SELECT * 
FROM caractere c
INNER join dispose d on c.id_caractere = d.id_caractere
where id_animal = :idAnimal
');
$stmt->bindValue(':idAnimal', $animal['id_animal']);
$stmt->execute();
$caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

?>

<?= styleTitreNiveau1($animal['nom_animal'], COLOR_TITRE_PENSIONNAIRES) ?>

<div class="row border border-dark rounded-3 m-2 align-items-center <?= ($animal['sexe']) ? "perso_bgVert" : "perso_bgRose" ?>">
    <div class="col p-2 center">
        <img src="../../sources/images/animaux/<?= $animal['type_animal'] ?>/<?= $image['url_image'] ?>" class="img-thumbnail" alt="<?= $image['libelle_image'] ?>" style="max-height: 180px">
    </div>

    <?php
    $iconeChien = "";
    if ($animal['ami_chien'] === "oui") $iconeChien = "chienOk.png";
    else if ($animal['ami_chien'] === "non") $iconeChien = "chienBar.png";
    else if ($animal['ami_chien'] === "N/A") $iconeChien = "chienQuest.png";
    $iconeChat = "";
    if ($animal['ami_chat'] === "oui") $iconeChat = "chatOk.png";
    else if ($animal['ami_chat'] === "non") $iconeChat = "chatBar.png";
    else if ($animal['ami_chat'] === "N/A") $iconeChat = "chatQuest.png";
    $iconeBaby = "";
    if ($animal['ami_enfant'] === "oui") $iconeBaby = "babyOk.png";
    else if ($animal['ami_enfant'] === "non") $iconeBaby = "babyBar.png";
    else if ($animal['ami_enfant'] === "N/A") $iconeBaby = "babyQuest.png";
    ?>
    <div class="col-2 col-md-1 border-start border-end text-center border-dark">
        <img src="../../sources/images/Autres/icones/<?= $iconeChien ?>" class="img-fluid m-1" alt="<?= $iconeChien ?>" style="width: 50px">
        <img src="../../sources/images/Autres/icones/<?= $iconeChat ?>" class="img-fluid m-1" alt="<?= $iconeChien ?>" style="width: 50px">
        <img src="../../sources/images/Autres/icones/<?= $iconeBaby ?>" class="img-fluid m-1" alt="<?= $iconeChien ?>" style="width: 50px">
    </div>

    <div class="col-6 col-md-4 text-center">
        <div class="perso_policeTitre perso_Size20 mb-3">Puce : <?php $animal['puce'] ?></div>
        <div class="mb-2">Née le : <?= $animal['date_naissance_animal'] ?></div>
        <div class="">
            <?php foreach ($caracteres as $caractere) : ?>
                <span class="badge bg-warning m-1 p-2 d-none d-sm-inline"><?= $caractere['libelle_caractere'] ?></span>
            <?php endforeach; ?>
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
            <hr />
            <p>
                <img src="../../sources/images/Autres/icones/oeil.jpg" alt="" width="50" height="50" class="d-block mx-auto">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit porro dolor at distinctio. Cum, voluptatibus soluta, nobis debitis quasi voluptatem ut earum inventore laboriosam saepe, odit reprehenderit. Fuga, ipsam cum?
            </p>
            <hr />
            <p>
                <img src="../../sources/images/Autres/icones/iconeContrat.png" alt="" width="50" height="50" class="d-block mx-auto">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur debitis facere molestiae cum aut repudiandae odit excepturi, officiis aliquam modi. Ratione molestiae maxime, id aliquam harum pariatur eaque voluptate architecto?
            </p>
        </div>
    </div>
</div>



<?php include '../Commons/footer.php'; ?>