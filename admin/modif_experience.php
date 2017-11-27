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
if(isset($_POST['e_titre'])){ // Si on a posté une nouvelle compétence
    echo 'rentre dans ligne 6 => ok';
    if(!empty($_POST['e_titre']) && !empty($_POST['e_soustitre']) && !empty($_POST['e_dates']) && !empty($_POST['e_description']) && !empty($_POST['id_experience'])){ // Si compétence n'est pas vide
        $titre = addslashes($_POST['e_titre']);
        $sousTitre = addslashes($_POST['e_soustitre']);
        $dates = addslashes($_POST['e_dates']);
        $description = addslashes($_POST['e_description']);
        $id_experience = addslashes($_POST['id_experience']);
        $pdoCV -> exec("UPDATE t_experiences SET e_titre = '$titre', e_soustitre = '$sousTitre', e_dates = '$dates', e_description = '$description' WHERE id_experience = '$id_experience'");
        header('location: experiences.php');
        exit();
    }
}// ferme if n'est pas vide



// je récupère la compétence
$id_experience = $_GET['id_experience']; // par l'id et get
$sql = $pdoCV -> query("SELECT * FROM t_experiences WHERE id_experience = '$id_experience'"); // la requete eest égale à l'ID
$ligne_experience = $sql -> fetch();

$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $sql -> fetch();

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<!-- <?php echo '<pre>'; print_r($ligne_realisation); echo '</pre>'; ?> -->
        <h1>Admin <?= $ligne_utilisateur['prenom']?></h1>
        <hr>

        <h2>Modification d'une realisation</h2>
        <p><?= $ligne_experience['e_titre'] ?></p>

        <form action="modif_experience.php" method="post">
            <label for="e_titre">Titre</label><br>
            <input type="text" name="e_titre" id ="e_titre" value="<?= $ligne_experience['e_titre'] ?>"><br><br>

            <label for="e_soustitre">Sous-titre</label><br>
            <input type="text" name="e_soustitre" id ="e_soustitre" value="<?= $ligne_experience['e_soustitre'] ?>"><br><br>

            <label for="e_dates">Dates</label><br>
            <input type="text" name="e_dates" id ="e_dates" value="<?= $ligne_experience['e_dates'] ?>"><br><br>

            <label for="e_description">Description</label><br>
            <input type="text" name="e_description" id ="e_description" value="<?= $ligne_experience['e_description'] ?>"><br><br>

            <input hidden name="id_experience" value="<?= $ligne_experience['id_experience'] ?>">

            <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>

<?php include('inc/footer.inc.php'); ?>
