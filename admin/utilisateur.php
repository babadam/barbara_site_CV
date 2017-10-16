<?php
require('connexion.php');


// Attention à personnaliser pour chaque page
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

include('inc/header.inc.php');
include('inc/nav.inc.php');

?>

<!-- Tableau permettant d'afficher les infos de l'utilisateur -->
<table border="2">
    <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>E-mail</th>
        <th>Téléphone</th>
        <th>Pseudo</th>
        <th>Avatar</th>
        <th>Age</th>
        <th>Date de naissance</th>
        <th>Sexe</th>
        <th>Etat civil</th>
        <th>Adresse</th>
        <th>Code postal</th>
        <th>Ville</th>
        <th>Pays</th>
        <th>Site web</th>
    </tr>
    <tr>
    <?php while($ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
       <td><?php echo $ligne_utilisateur;?></td>
   </tr>
    <?php } ?>
</table>




<?php include('inc/footer.inc.php'); ?>
