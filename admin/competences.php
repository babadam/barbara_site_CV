<?php
include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    // echo $_SESSION['connexion'];
}else{ // l'utilisateur n'est pas connecté
    header('location: connexionAdmin.php');
}




if(isset($_POST['competence'])){ // Si on a posté une nouvelle compétence
    echo 'rentre dans ligne 6 => ok';
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){ // Si compétence n'est pas vide
        echo 'rentre dans $_POST pas vide IF ligne 8';
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdoCV -> exec("INSERT INTO t_competences (id_competence, competence, c_niveau, utilisateur_id) VALUES (NULL, '$competence', '$c_niveau', $id_utilisateur)"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location:competences.php");
        exit();

    }// ferme if n'est pas vide

} // ferme le if isset insertion

// Supression d'une compétence
if(isset($_GET['id_competence'])){
 // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_competence'];
    $sql = " DELETE FROM t_competences WHERE id_competence = '$efface' ";
    $pdoCV ->query($sql);
    header("location: competences.php");
} // ferme le if isset supression

    $sql = $pdoCV -> prepare("SELECT * FROM t_competences WHERE utilisateur_id = '$id_utilisateur'");
    $sql -> execute();
    $nbr_competences =  $sql -> rowCount();


include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container">
    <div class="row">
        <h1> Compétences</h1>
        <!-- <h2>Admin Baba</h2> -->
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p> Il y a <?php if ($nbr_competences <= 1){
                        echo $nbr_competences.' competence';
                    }else{
                        echo $nbr_competences.' competences';
                    }?></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Liste des competences</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Compétence</th>
                            <th>Niveau en %</th>
                            <th>Modification</th>
                            <th>Supression</th>
                        </tr>
                        <tr>
                        <?php while($ligne_competence = $sql -> fetch(PDO::FETCH_ASSOC) ) {?>
                           <td><?php echo $ligne_competence['competence'] ;?></td>
                           <td><?php echo $ligne_competence['c_niveau'] ;?></td>
                           <td><a href="modif_competence.php?id_competence=<?= $ligne_competence['id_competence']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                           <td><a href="competences.php?id_competence=<?= $ligne_competence['id_competence']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
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
                        <p>Insertion d'une competence</p>
                </div>
                <div class="panel-body">
                    <form action="competences.php" method="post">
                        <div class="form-group">
                            <label for="competence">Compétence</label>
                            <input type="text" class="form-control" id="competence" name="competence" placeholder="Insérez votre competence">
                        </div>
                        <div class="form-group">
                            <label for="c_niveau">Niveau</label>
                            <input type="text" class="form-control" id="c_niveau" name="c_niveau" placeholder="Insérez votre competence">
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>
