<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>


        <h1>Admin <?= $ligne_utilisateur['prenom']?></h1>

        <p>Texte</p>
        <hr>
        <?php
            $resultat = $pdoCV -> query("SELECT * FROM t_competences");
            $ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
        ?>
        <h2>Accueil admin</h2>

<?php include('inc/footer.inc.php'); ?>
