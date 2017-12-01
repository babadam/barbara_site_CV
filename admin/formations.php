<?php

include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ // si pas connecté : redirection vers le formulaire de ocnnexion
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    // echo $_SESSION['connexion'];
}else{ // l'utilisateur n'est pas connecté
    header('location: connexionAdmin.php');
}


$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC);

if(isset($_POST['f_titre'])){ // Si on a posté une nouvelle compétence
    echo 'rentre dans ligne 6 => ok';
    if(!empty($_POST['f_titre']) && !empty($_POST['f_soustitre']) && !empty($_POST['f_dates']) && !empty($_POST['f_description'])){ // Si compétence n'est pas vide
        $titre = addslashes($_POST['f_titre']);
        $sousTitre = addslashes($_POST['f_soustitre']);
        $dates = addslashes($_POST['f_dates']);
        $description = addslashes($_POST['f_description']);
        $pdoCV -> exec("INSERT INTO t_formation (f_titre, f_soustitre, f_dates, f_description, utilisateur_id) VALUES ('$titre', '$sousTitre', '$dates', '$description', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location:formations.php");
        exit();

    }// ferme if n'est pas vide
}

// Supression d'une compétence
if(isset($_GET['id_formation'])){
 // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_formation'];
    $sql = " DELETE FROM t_formation WHERE id_formation = '$efface' ";
    $pdoCV ->query($sql);
    header("location: formations.php");
} // ferme le if isset supression

    $sql = $pdoCV -> prepare("SELECT * FROM t_formation WHERE utilisateur_id = '$id_utilisateur'");
    $sql -> execute();
    $nbr_formations =  $sql -> rowCount();


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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p> Il y a <?php if ($nbr_formations <= 1){
                        echo $nbr_formations.' formation';
                        }else{
                        echo $nbr_formations.' formations';
                        }?></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Liste des formations</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
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
                        <?php while($ligne_formation = $sql -> fetch(PDO::FETCH_ASSOC) ) {?>
                           <td><?php echo $ligne_formation['f_titre'] ;?></td>
                           <td><?php echo $ligne_formation['f_soustitre'] ;?></td>
                           <td><?php echo $ligne_formation['f_dates'] ;?></td>
                           <td><?php echo $ligne_formation['f_description'] ;?></td>
                           <td><a href="modif_formation.php?id_formation=<?= $ligne_formation['id_formation']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                           <td><a href="formations.php?id_formation=<?= $ligne_formation['id_formation']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                       </tr>
                        <?php } ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                        <p>Insertion d'une formation</p>
                </div>
                <div class="panel-body">
                    <form action="formations.php" method="post">
                        <div class="form-group">
                            <label for="f_titre">Titre</label>
                            <input type="text" class="form-control" id="f_titre" name="f_titre" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="f_soustitre">Sous-titre</label>
                            <input type="text" class="form-control" id="f_soustitre" name="f_soustitre" placeholder="Sous-titre">
                        </div>
                        <div class="form-group">
                            <label for="f_dates">Dates</label>
                            <input type="text" class="form-control" id="f_dates" name="f_dates" placeholder="Insérez les dates">
                        </div>
                        <div class="form-group">
                            <label for="f_description">Description</label>
                            <textarea class="form-control" id="editor1" name="f_description" placeholder="Décrire la formation"></textarea>
                        </div>
                        <script>
                                CKEDITOR.replace('editor1');
                        </script>

                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
            <?php include('inc/footer.inc.php'); ?>
