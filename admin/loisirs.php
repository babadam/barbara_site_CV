<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch();

// Gestion des contenus de la BDD compétence

// Insertion d'une compétence
if(isset($_POST['loisir'])){ // Si on a posté une nouvelle compétence
    if(!empty($_POST['loisir'])){ // Si compétence n'est pas vide
        $loisir = addslashes($_POST['loisir']);
        $pdoCV -> exec("INSERT INTO t_loisirs (id_loisir, loisir, utilisateur_id) VALUES (NULL, '$loisir', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: loisirs.php");
        exit();

    }// ferme if n'est pas vide

} // ferme le if isset insertion

// Supression d'une compétence
if(isset($_GET['id_loisir'])){ // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_loisir'];
    $resultat = " DELETE FROM t_loisirs WHERE id_loisir = '$efface' ";
    $pdoCV ->query($resultat);
    header("location: loisirs.php");
} // ferme le if isset supression

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
        <?php
            $resultat = $pdoCV -> prepare("SELECT * FROM t_loisirs WHERE utilisateur_id = '1'");
            $resultat -> execute();
            $nbr_loisirs =  $resultat -> rowCount();
        ?>
        <h2> Mes loisirs</h2>
        <p> Il y a <?= $nbr_loisirs; ?> loisirs</p>

        <table border="2">
            <tr>
                <th>Loisirs</th>
                <th>Modification</th>
                <th>Suppression</th>
            </tr>
            <tr>
            <?php while($ligne_loisir = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
               <td><?php echo $ligne_loisir['loisir'] ;?></td>
               <td><a href="modif_loisir.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>">modifier</a></td>
               <td><a href="loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>">supprimer</a></td>
           </tr>
            <?php } ?>
        </table>
        <hr>

        <h3>Insertion d'un loisir</h3>

            <!--formulaire d'insertion-->
            <form action="loisirs.php" method="post">
                <label for="loisir"> Loisir :</label><br>
                <input type="text" name="loisir" id="loisir" placeholder="Insérez votre loisir"><br><br>

                <input type="submit" value="Insérez">
            </form>
    </body>
</html>

<?php include('inc/footer.inc.php'); ?>
