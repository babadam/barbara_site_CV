<?php
require('connexion.php');

// mise à jour d'une compétence
if(isset($_POST['competence'])){ // par le nom d'une premier input
    $competence = addslashes($_POST['competence']);
    $c_niveau = addslashes($_POST['c_niveau']);
    $id_competence = $_POST['id_competence'];

    $pdoCV -> exec("UPDATE t_competences SET competence = '$competence', c_niveau = '$c_niveau' WHERE id_competence = '$id_competence'");
    header('location: competences.php');
    exit();
}

// je récupère la compétence
$id_competence = $_GET['id_competence']; // par l'id et get
$resultat = $pdoCV -> query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'"); // la requete eest égale à l'ID
$ligne_competence = $resultat -> fetch();

$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch();

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
        <p>Texte</p>
        <hr>

        <h2>Modification d'une compétence</h2>
        <p><?= $ligne_competence['competence'] ?></p>

        <form action="#" method="post">
            <label for="competence">Compétence :</label><br>
            <input type="text" name="competence" id ="competence" value="<?= $ligne_competence['competence'] ?>"><br><br>

            <label for="c_niveau">Niveau :</label><br>
            <input type="number" name="c_niveau" id= "c_niveau" value="<?= $ligne_competence['c_niveau'] ?>"><br><br>

            <input hidden name="id_competence" value="<?= $ligne_competence['id_competence'] ?>">

            <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>

<?php include('inc/footer.inc.php'); ?>
