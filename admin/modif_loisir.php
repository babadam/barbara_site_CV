<?php
include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ // si pas connecté : redirection vers le formulaire de ocnnexion
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    echo $_SESSION['connexion'];
}else{ // l'utilisateur n'est pas connecté
    header('location: connexionAdmin.php');
}


// mise à jour d'une compétence
if(isset($_POST['loisir'])){ // par le nom d'une premier input
    $loisir = addslashes($_POST['loisir']);
    $id_loisir = $_POST['id_loisir'];

    $pdoCV -> exec("UPDATE t_loisirs SET loisir = '$loisir' WHERE id_loisir = '$id_loisir'");
    header('location: loisirs.php');
    exit();
}

// je récupère la compétence
$id_loisir = $_GET['id_loisir']; // par l'id et get
$sql = $pdoCV -> query("SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir'"); // la requete eest égale à l'ID
$ligne_loisir = $sql -> fetch();

//pour afficher l'utilisateur
$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $sql -> fetch();

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Admin : <?= $ligne_utilisateur['pseudo']?> </title>
        </head>
    </head>
    <body>
        <h1>Admin <?= $ligne_utilisateur['prenom']?></h1>
        <hr>

        <h2>Modification d'un loisir </h2>
        <p><?= $ligne_loisir['loisir'] ?></p>

        <form action="#" method="post">
            <label for="loisir">Loisir :</label><br>
            <input type="text" name="loisir" id ="loisir" value="<?= $ligne_loisir['loisir'] ?>"><br><br>

            <input hidden name="id_loisir" value="<?= $ligne_loisir['id_loisir'] ?>">

            <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>

<?php include('inc/footer.inc.php'); ?>
