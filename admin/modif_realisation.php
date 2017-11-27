<?php
include('inc/init.inc.php');
$titre='';
$sousTitre='';
$dates='';
$description='';

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ // si pas connecté : redirection vers le formulaire de ocnnexion
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    echo $_SESSION['connexion'];
}else{ // l'utilisateur n'est pas connecté
    header('location: connexionAdmin.php');
}

// mise à jour d'une compétence
if(isset($_POST['r_titre'])){ // Si on a posté une nouvelle compétence
    echo 'rentre dans ligne 6 => ok';
    if(!empty($_POST['r_titre']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_dates']) && !empty($_POST['r_description']) && !empty($_POST['id_realisation'])){ // Si compétence n'est pas vide
        $titre = addslashes($_POST['r_titre']);
        $sousTitre = addslashes($_POST['r_soustitre']);
        $dates = addslashes($_POST['r_dates']);
        $description = addslashes($_POST['r_description']);
        $id_realisation = addslashes($_POST['id_realisation']);
        $pdoCV -> exec("UPDATE t_realisations SET r_titre = '$titre', r_soustitre = '$sousTitre', r_dates = '$dates', r_description = '$description' WHERE id_realisation = '$id_realisation'");
        header('location: realisations.php');
        exit();
    }
}// ferme if n'est pas vide



// je récupère la compétence
$id_realisation = $_GET['id_realisation']; // par l'id et get
$sql = $pdoCV -> query("SELECT * FROM t_realisations WHERE id_realisation = '$id_realisation'"); // la requete eest égale à l'ID
$ligne_realisation = $sql -> fetch();

$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $sql -> fetch();

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<!-- <?php echo '<pre>'; print_r($ligne_realisation); echo '</pre>'; ?> -->
        <h1>Admin <?= $ligne_utilisateur['prenom']?></h1>
        <hr>
        <h2 class="well">Modification d'une realisation</h2>
        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div><?= $ligne_realisation['r_titre'] ?></div>
                </div>
                <div class="panel-body">
                    <form action="modif_realisation.php" method="post">
                        <div class="form-group">
                            <label for="r_titre">Titre</label><br>
                            <input type="text" name="r_titre" id ="r_titre" value="<?= $ligne_realisation['r_titre'] ?>"><br><br>
                        </div>

                        <div class="form-group">
                            <label for="r_soustitre">Sous-titre</label><br>
                            <input type="text" name="r_soustitre" id ="r_soustitre" value="<?= $ligne_realisation['r_soustitre'] ?>"><br><br>
                        </div>

                        <div class="form-group">
                            <label for="r_dates">Dates</label><br>
                            <input type="text" name="r_dates" id ="r_dates" value="<?= $ligne_realisation['r_dates'] ?>"><br><br>
                        </div>

                        <div class="form-group">
                            <label for="r_description">Description</label><br>
                            <input type="text" name="r_description" id ="r_description" value="<?= $ligne_realisation['r_description'] ?>"><br><br>
                        </div>

                        <input hidden name="id_realisation" value="<?= $ligne_realisation['id_realisation'] ?>">

                        <input type="submit" name="" class="btn btn-danger btn-block" value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php include('inc/footer.inc.php'); ?>
