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
if(isset($_POST['f_titre'])){ // Si on a posté une nouvelle compétence
    echo 'rentre dans ligne 6 => ok';
    if(!empty($_POST['f_titre']) && !empty($_POST['f_soustitre']) && !empty($_POST['f_dates']) && !empty($_POST['f_description']) && !empty($_POST['id_formation'])){ // Si compétence n'est pas vide
        $titre = addslashes($_POST['f_titre']);
        $sousTitre = addslashes($_POST['f_soustitre']);
        $dates = addslashes($_POST['f_dates']);
        $description = addslashes($_POST['f_description']);
        $id_formation = addslashes($_POST['id_formation']);
        $pdoCV -> exec("UPDATE t_formation SET f_titre = '$titre', f_soustitre = '$sousTitre', f_dates = '$dates', f_description = '$description' WHERE id_formation = '$id_formation'");
        header('location: formations.php');
        exit();
    }
}// ferme if n'est pas vide



// je récupère la compétence
$id_formation = $_GET['id_formation']; // par l'id et get
$sql = $pdoCV -> query("SELECT * FROM t_formation WHERE id_formation = '$id_formation'"); // la requete eest égale à l'ID
$ligne_formation = $sql -> fetch();

$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $sql -> fetch();

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<!-- <?php echo '<pre>'; print_r($ligne_realisation); echo '</pre>'; ?> -->
        <h1>Admin <?= $ligne_utilisateur['prenom']?></h1>
        <p>Texte</p>
        <hr>

        <h2>Modification d'une realisation</h2>
        <p><?= $ligne_formation['f_titre'] ?></p>

        <form action="modif_formation.php" method="post">
            <label for="f_titre">Titre</label><br>
            <input type="text" name="f_titre" id ="f_titre" value="<?= $ligne_formation['f_titre'] ?>"><br><br>

            <label for="f_soustitre">Sous-titre</label><br>
            <input type="text" name="f_soustitre" id ="f_soustitre" value="<?= $ligne_formation['f_soustitre'] ?>"><br><br>

            <label for="f_dates">Dates</label><br>
            <input type="text" name="f_dates" id ="f_dates" value="<?= $ligne_formation['f_dates'] ?>"><br><br>

            <label for="f_description">Description</label><br>
            <input type="text" name="f_description" id ="f_description" value="<?= $ligne_formation['f_description'] ?>"><br><br>

            <input hidden name="id_formation" value="<?= $ligne_formation['id_formation'] ?>">

            <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>

<?php include('inc/footer.inc.php'); ?>
