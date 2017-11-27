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



if(isset($_POST['loisir'])){ // Si on a posté une nouvelle compétence
    if(!empty($_POST['loisir'])){ // Si compétence n'est pas vide
        $loisir = addslashes($_POST['loisir']);
        $pdoCV -> exec("INSERT INTO t_loisirs (id_loisir, loisir, utilisateur_id) VALUES (NULL, '$loisir', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: loisirs.php");
        exit();

    }// ferme if n'est pas vide

} // ferme le if isset insertion

// Supression d'une compétence
if(isset($_GET['id_loisir'])){ // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_loisir'];
    $sql = " DELETE FROM t_loisirs WHERE id_loisir = '$efface' ";
    $pdoCV ->query($sql);
    header("location: loisirs.php");
} // ferme le if isset supression

    $sql = $pdoCV -> prepare("SELECT * FROM t_loisirs WHERE utilisateur_id = '$id_utilisateur'");
    $sql -> execute();
    $nbr_loisirs =  $sql -> rowCount();


include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container">
    <div class="row">
        <h1><?= $ligne_utilisateur['prenom']?></h1>
        <!-- <h2>Admin Baba</h2> -->
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p> Il y a <?php if ($nbr_loisirs <= 1){
                        echo $nbr_loisirs.' loisir';
                        }else{
                        echo $nbr_loisirs.' loisirs';
                        }?></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Liste des loisirs</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Loisirs</th>
                            <th>Modification</th>
                            <th>Supression</th>
                        </tr>
                        <tr>
                        <?php while($ligne_loisir = $sql -> fetch(PDO::FETCH_ASSOC) ) {?>
                           <td><?php echo $ligne_loisir['loisir'] ;?></td>
                           <td><a href="modif_loisir.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                           <td><a href="loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
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
                        <p>Insertion d'un loisir</p>
                </div>
                <div class="panel-body">
                    <form action="loisirs.php" method="post">
                        <div class="form-group">
                            <label for="loisir">Loisir</label>
                            <input type="text" class="form-control" id="loisir" name="loisir" placeholder="Insérez votre loisir">
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
            <?php include('inc/footer.inc.php'); ?>
