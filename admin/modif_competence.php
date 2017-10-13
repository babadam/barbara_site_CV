<?php
require('connexion.php');

// je récupère la compétence
$id_competence = $_GET['id_competence']; // par l'id et get
$resultat = $pdoCV -> query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'"); // la requete eest égale à l'ID
$ligne_competence = $resultat -> fetch();

$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch();
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
    </body>
</html>
