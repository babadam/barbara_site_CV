<?php

include('inc/init.inc.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

if(isset($_POST['e_titre'])){ // Si on a posté une nouvelle compétence
    echo 'rentre dans ligne 6 => ok';
    if(!empty($_POST['e_titre']) && !empty($_POST['e_soustitre']) && !empty($_POST['e_dates']) && !empty($_POST['e_description'])){ // Si compétence n'est pas vide
        $titre = addslashes($_POST['e_titre']);
        $sousTitre = addslashes($_POST['e_soustitre']);
        $dates = addslashes($_POST['e_dates']);
        $description = addslashes($_POST['e_description']);
        $pdoCV -> exec("INSERT INTO t_experiences (e_titre, e_soustitre, e_dates, e_description, utilisateur_id) VALUES ('$titre', '$sousTitre', '$dates', '$description', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location:experiences.php");
        exit();

    }// ferme if n'est pas vide
}

// Supression d'une compétence
if(isset($_GET['id_experience'])){
 // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_experience'];
    $resultat = " DELETE FROM t_experiences WHERE id_experience = '$efface' ";
    $pdoCV ->query($resultat);
    header("location: experiences.php");
} // ferme le if isset supression

    $resultat = $pdoCV -> prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
    $resultat -> execute();
    $nbr_experiences =  $resultat -> rowCount();


include('inc/header.inc.php');
include('inc/nav.inc.php');

?>
<div class="container">
    <div class="row">
        <h1><?= $ligne_utilisateur['prenom']?></h1>
        <!-- <h2>Admin Baba</h2> -->
    </div>
    <!-- <?php echo $msg ?> -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <p> Il y a <?= $nbr_experiences; ?> expériences</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Liste des expériences</p>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Titre</th>
                            <th>Soustitre</th>
                            <th>Dates</th>
                            <th>Description</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>

                        </tr>
                        <tr>
                        <?php while($ligne_experience = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                           <td><?php echo $ligne_experience['e_titre'] ;?></td>
                           <td><?php echo $ligne_experience['e_soustitre'] ;?></td>
                           <td><?php echo $ligne_experience['e_dates'] ;?></td>
                           <td><?php echo $ligne_experience['e_description'] ;?></td>
                           <td><a href="modif_experience.php?id_experience=<?= $ligne_experience['id_experience']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                           <td><a href="experiences.php?id_experience=<?= $ligne_experience['id_experience']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                       </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="panel panel-info">
                <div class="panel-heading">
                        <p>Insertion d'une experience</p>
                </div>
                <div class="panel-body">
                    <form action="experiences.php" method="post">
                        <div class="form-group">
                            <label for="e_titre">Titre</label>
                            <input type="text" class="form-control" id="e_titre" name="e_titre" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="e_soustitre">Sous-titre</label>
                            <input type="text" class="form-control" id="e_soustitre" name="e_soustitre" placeholder="Sous-titre">
                        </div>
                        <div class="form-group">
                            <label for="e_dates">Dates</label>
                            <input type="text" class="form-control" id="e_dates" name="e_dates" placeholder="Insérez les dates">
                        </div>
                        <div class="form-group">
                            <label for="e_description">Description</label>
                            <textarea class="form-control" id="e_description" name="e_description" placeholder="Décrire la formation"></textarea>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
            <?php include('inc/footer.inc.php'); ?>
