<?php
require('inc/init.inc.php');
require('inc/header.inc.php');
require('inc/nav.inc.php');
// require('inc/fonctions.inc.php');
if(!$_SESSION['connexion'] == 'connecté') {
    header('location:sauthentifier.php');
}
if(isset($_POST['modifie'])) {
    $id_utilisateur = addslashes($_POST['id_utilisateur']);
    $prenom         = addslashes($_POST['prenom']);
    $nom            = addslashes($_POST['nom']);
    $email          = addslashes($_POST['email']);
    $telephone      = addslashes($_POST['telephone']);
    $pseudo         = addslashes($_POST['pseudo']);
    $age            = addslashes($_POST['age']);
    $date_naissance = addslashes($_POST['date_naissance']);
    $sexe           = addslashes($_POST['sexe']);
    $adresse        = addslashes($_POST['adresse']);
    $code_postal    = addslashes($_POST['code_postal']);
    $ville          = addslashes($_POST['ville']);
    $etat_civil     = addslashes($_POST['etat_civil']);
    $pays           = addslashes($_POST['pays']);
    $site_web       = addslashes($_POST['site_web']);

    $resultat = $pdoCV->exec(
        "UPDATE t_utilisateurs SET
        prenom = '$prenom',
        nom = '$nom',
        email = '$email',
        telephone = '$telephone',
        pseudo = '$pseudo',
        age = '$age',
        date_naissance = '$date_naissance',
        sexe = '$sexe',
        etat_civil = '$etat_civil',
        adresse = '$adresse',
        code_postal = '$code_postal',
        ville = '$ville',
        pays = '$pays',
        site_web = '$site_web'
        WHERE id_utilisateur = '$id_utilisateur'");
    if($resultat) {
        header('location:profil.php');
    }

}
?>
<div class="row">
    <div class="col-md-8 personal-info">
        <form class="form-horizontal" method="POST" action="#">
            <input type="hidden" name="id_utilisateur" value="<?= $ligne_utilisateur['id_utilisateur']; ?>">
            <div class="form-group">
                <label class="col-lg-4 control-label">Prenom</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="prenom" value="<?= $ligne_utilisateur['prenom']; ?>">
            </div>
            </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Nom</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="nom" value="<?= $ligne_utilisateur['nom']; ?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Email</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="email" value="<?= $ligne_utilisateur['email']; ?>">
            </div>
        </div>
        <div class="form-group">
              <label class="col-lg-4 control-label">Pseudo</label>
          <div class="col-lg-8">
              <input class="form-control" type="text" name="pseudo" value="<?= $ligne_utilisateur['pseudo']; ?>">
          </div>
        </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Téléphone portable</label>
            <div class="col-lg-8">
                <input class="form-control" name="telephone" type="text" value="<?= $ligne_utilisateur['telephone']; ?>">
            </div>
        </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Age</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="age" value="<?= $ligne_utilisateur['age']; ?>">
            </div>
            </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Date de naissance</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="date_naissance" value="<?= $ligne_utilisateur['date_naissance']; ?>">
            </div>
          </div>
          <div class="form-group">
              <label class="col-lg-4 control-label">Sexe</label>
              <div class="col-lg-8">
                  <input class="form-control" type="text" name="sexe" value="<?= $ligne_utilisateur['sexe']; ?>">
              </div>
          </div>
          <div class="form-group">
              <label class="col-lg-4 control-label">Etat civil</label>
              <div class="col-lg-8">
                  <input class="form-control" type="text" name="etat_civil" value="<?= $ligne_utilisateur['etat_civil']; ?>">
              </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Adresse</label>
            <div class="col-lg-8">
                <textarea class="form-control" type="text" name="adresse"><?= $ligne_utilisateur['adresse']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Code Postal</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="code_postal" value="<?= $ligne_utilisateur['code_postal']; ?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Ville</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="ville" value="<?= $ligne_utilisateur['ville']; ?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Pays</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="pays" value="<?= $ligne_utilisateur['pays']; ?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Site internet</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" name="site_web" value="<?= $ligne_utilisateur['site_web']; ?>">
            </div>
          </div>
          <div class="form-group">
                <input type="submit" class="btn btn-block btn-primary" name="modifie" value="Modifier">
          </div>
        </div>
     </form>
 </div>
<?php require('inc/footer.inc.php'); ?>
