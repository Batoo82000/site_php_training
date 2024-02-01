
<?php include '../Commons/header.php'; ?>


<?= styleTitreNiveau1("Contact", COLOR_TITRE_CONTACTS) ?>


<div class="row g-0 ">

<?= styleTitreNiveau3("Pour nous contacter :", COLOR_TITRE_CONTACTS) ?>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae hic, quos incidunt quae explicabo voluptate sapiente distinctio provident temporibus cupiditate eligendi ab culpa fuga harum aliquid impedit ducimus autem optio.
Quis illo exercitationem nisi accusantium pariatur. Natus laborum voluptate ut est quibusdam soluta a fugit. Officiis debitis qui, quasi veniam soluta ducimus expedita enim quibusdam nostrum, id magni labore nisi.</p>

</div>

<?= styleTitreNiveau3("Formulaire de contact :", COLOR_TITRE_CONTACTS) ?>
<form method="POST" action="#" class="ps-5">
    <div class="form-group row g-0 align-items-center mt-2">
        <label for="nom" class="col-auto pe-3">Nom : </label>
        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" class="form-control col" required>
    </div>
    <div class="form-group row g-0 align-items-center mt-2">
        <label for="mail" class="col-auto pe-3">Email : </label>
        <input type="email" name="mail" id="mail" placeholder="Email@exemple.com" class="form-control col" required>
    </div>
    <div class="form-group row g-0 align-items-center mt-2">
        <label for="objet" class="col-auto pe-3">Objet : </label>
        <select name="objet" id="objet" class="form-control col form-select">
            <option value="question">   Question    </option>
            <option value="adoption">   Adoption    </option>
            <option value="donnation">  Donnation   </option>
            <option value="autre">      Autre       </option>
        </select>
    </div>
    <div class="form-group g-0 align-items-center">
        <label for="message" class="col-auto pe-3">Message : </label>
        <textarea class="form-control" name="message" id="message" rows="3" required></textarea>
    </div>
    <div class="form-group g-0 align-items-center">
        <label for="captcha" class="col-auto pe-3">Conbien font 3+5 :</label>
        <input type="number" name="captcha" id="captcha" class="form-control col" required>
    </div>
    <input type="submit" value="Valider" class="btn btn-primary mt-3 mx-auto d-block">

</form>

<?php
if(isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['mail']) && !empty($_POST['mail']) &&
    isset($_POST['objet']) && !empty($_POST['objet']) &&
    isset($_POST['message']) && !empty($_POST['message']) &&
    isset($_POST['captcha']) && !empty($_POST['captcha']) &&
    filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)
)
{
    $captcha = (int)$_POST['captcha'];
    if($captcha === 8){

        $nom =htmlentities((string)$_POST['nom']);
        $mail =htmlentities((string)$_POST['mail']);
        $objet =htmlentities((string)$_POST['objet']);
        $message =htmlentities((string)$_POST['message']);
        $destinataire = "pweb.iddees@gmail.com";
        mail($destinataire, $objet . " - " . $nom, "Mail :" . $mail . "Message : " . $message);
        echo '<div class="alert alert-success" role="alert">';
        echo "Le message est envoyé !";
        echo '</div>';
    }
    else {

        echo '<div class="alert alert-danger" role="alert">';
        echo "Le captcha saisi n'est pas correct";
        echo '</div>';
    }
}
;?>

<?php include '../Commons/footer.php';?>