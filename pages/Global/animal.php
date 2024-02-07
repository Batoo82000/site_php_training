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
');
$stmt->bindValue(':idAnimal', $animal['id_animal']);
$stmt->execute();
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <img src="../../sources/images/animaux/<?= $animal['type_animal'] ?>/<?= $images[0]['url_image'] ?>" class="img-thumbnail" alt="<?= $images[0]['libelle_image'] ?>" style="max-height: 180px">
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
                <span class="badge bg-warning m-1 p-2 d-none d-sm-inline"><?= ($animal['sexe']) ? $caractere['libelle_caractere_m'] : $caractere['libelle_caractere_f'] ?></span>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- <div class="col-12 col-md-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br />
        Architecto ea unde reiciendis soluta, quasi adipisci qui atque <br />
        aliquid quisquam nisi fuga voluptas aperiam praesentium cupiditate nihil saepe aspernatur eaque odio.
    </div> -->
</div>

<div class="row g-0 align-items-center">
    <div class="col-12 col-lg-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <?php foreach ($images as $key => $image) : ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $key ?>" class="<?php echo ($key === 0) ? "active" : "" ?> bg-dark" aria-current="true" aria-label="Slide 1"></button>
            <?php endforeach; ?>
            </div>
            <div class="carousel-inner text-center">
                <?php foreach ($images as $key => $image) : ?>
                    <div class="carousel-item <?php echo ($key === 0) ? "active" : "" ?>">
                        <img src="../../sources/images/animaux/<?= $animal['type_animal'] ?>/<?= $image['url_image'] ?>" class="img-thumbnail" style="height:500px;" alt="<?= $image['libelle_image']?>">
                    </div>
                <?php endforeach; ?>
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
                <?= $animal['description_animal'] ?>
            </p>
            <hr />
            <p>
                <img src="../../sources/images/Autres/icones/oeil.jpg" alt="" width="50" height="50" class="d-block mx-auto">
                <?= $animal['adoption_description_animal'] ?>
            </p>
            <hr />
            <p>
                <img src="../../sources/images/Autres/icones/iconeContrat.png" alt="" width="50" height="50" class="d-block mx-auto">
                <?= $animal['engagement_description_animal'] ?>
            </p>
        </div>
    </div>
</div>



<?php include '../Commons/footer.php'; ?>