<?php include '../Commons/header.php'; ?>

<?php
require_once 'pdo.php';

$bdd = connexionPDO();
$stmt = $bdd->prepare("SELECT * FROM animal");
$stmt->execute();
$animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

?>

<?= styleTitreNiveau1("Ils cherchent une famille", COLOR_TITRE_PENSIONNAIRES) ?>


<div class="row g-0">
    <?php foreach ($animaux as $animal) : ?>
        <?php
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
        ?>

        <div class="col-12 col-lg-6">
            <div class="row border border-dark rounded-3 m-2 align-items-center perso_bgRose" style="height: 200px;">
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

                <div class="col-2 border-start border-end text-center border-dark">
                    <img src="../../sources/images/Autres/icones/<?= $iconeChien ?>" class="img-fluid m-1" alt="<?= $iconeChien ?>" style="width: 50px">
                    <img src="../../sources/images/Autres/icones/<?= $iconeChat ?>" class="img-fluid m-1" alt="<?= $iconeChien ?>" style="width: 50px">
                    <img src="../../sources/images/Autres/icones/<?= $iconeBaby ?>" class="img-fluid m-1" alt="<?= $iconeChien ?>" style="width: 50px">
                </div>
                <div class="col-6 text-center">
                    <div class="perso_policeTitre perso_Size20 mb-3"><?= $animal['nom_animal'] ?></div>
                    <div class="mb-2"><?= $animal['date_naissance_animal'] ?></div>
                    <?php
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
                    <div class="">
                        <?php foreach ($caracteres as $caractere) : ?>
                            <span class="badge bg-warning m-1 p-2 d-none d-sm-inline"><?= $caractere['libelle_caractere'] ?></span>
                            
                        <?php endforeach; ?>
                        <a href="./animal.php?idAnimal=<?= $animal['id_animal'] ?>" class="btn btn-primary my-3">Visitez ma page</a>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>




<?php include '../Commons/footer.php'; ?>