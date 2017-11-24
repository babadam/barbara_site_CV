<?php
include('inc/init.inc.php');


// Attention à personnaliser pour chaque page

$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC);

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>


        <!-- Contenu de la page -->

<?php include('inc/footer.inc.php'); ?>
