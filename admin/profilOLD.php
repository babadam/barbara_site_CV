<?php
include('inc/init.inc.php');


$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC);

// requête pour compter les expériences
$sql = $pdoCV -> prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
$sql -> execute();
$nbr_experiences =  $sql -> rowCount();

// requête pour compter les réalisations
$sql = $pdoCV -> prepare("SELECT * FROM t_realisations WHERE utilisateur_id = '1'");
$sql -> execute();
$nbr_realisations =  $sql -> rowCount();

// requête pour compter les formations
$sql = $pdoCV -> prepare("SELECT * FROM t_formation WHERE utilisateur_id = '1'");
$sql -> execute();
$nbr_formations =  $sql -> rowCount();

// requête pour compter les competences
$sql = $pdoCV -> prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1'");
$sql -> execute();
$nbr_competences =  $sql -> rowCount();

// requête pour compter les loisirs
$sql = $pdoCV -> prepare("SELECT * FROM t_loisirs WHERE utilisateur_id = '1'");
$sql -> execute();
$nbr_loisirs =  $sql -> rowCount();



include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container">
    <div class="row">
        <h1 class="col-md-offset-4">Profil</h1>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Profil de l'utilisateur</p>
                </div>
                <div class="container">
                    <div class="panel-body">
                        <!-- <div class="table-responsive"> -->
                        <!-- <table class="table table-bordered table-striped"> -->
                            <!-- <tr class=""> -->
                            <ul class="list-unstyled">
                                <li>Prénom : <?php echo $ligne_utilisateur['prenom'] ;?></li>
                                <li>Nom : <?php echo $ligne_utilisateur['nom'] ;?></li>
                                <li>Email : <?php echo $ligne_utilisateur['email'] ;?></li>
                                <li>Téléphone : <?php echo $ligne_utilisateur['telephone'] ;?></li>
                                <li>Pseudo : <?php echo $ligne_utilisateur['pseudo'] ;?></li>
                                <li>Age : <?php echo $ligne_utilisateur['age'] ;?></li>
                                <li>Date de naissance : <?php echo $ligne_utilisateur['date_naissance'] ;?></li>
                                <li>Civilité : <?php echo $ligne_utilisateur['sexe'] ;?></li>
                                <li>Adresse : <?php echo $ligne_utilisateur['adresse'] ;?></li>
                                <li>Code postal : <?php echo $ligne_utilisateur['code_postal'] ;?></li>
                                <li>Ville : <?php echo $ligne_utilisateur['ville'] ;?></li>
                                <li>Pays : <?php echo $ligne_utilisateur['pays'] ;?></li>
                                <li><a href="modif_utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></li>
                            </ul>
                       </div>
                   </div>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="experiences.php"> Il y a <?php if ($nbr_experiences <= 1){
                            echo $nbr_experiences.' experience';
                            }else{
                            echo $nbr_experiences.' experiences';
                        }?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="realisations.php"> Il y a <?php if ($nbr_realisations <= 1){
                            echo $nbr_realisations.' realisation';
                            }else{
                            echo $nbr_realisations.' realisations';
                        }?></a href="">
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="formations.php"> Il y a <?php if ($nbr_formations <= 1){
                            echo $nbr_formations.' formation';
                            }else{
                            echo $nbr_formations.' formations';
                        }?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="competences.php"> Il y a <?php if ($nbr_competences <= 1){
                            echo $nbr_competences.' competence';
                        }else{
                            echo $nbr_competences.' competences';
                        }?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="loisirs.php"> Il y a <?php if ($nbr_loisirs <= 1){
                            echo $nbr_loisirs.' loisir';
                            }else{
                            echo $nbr_loisirs.' loisirs';
                        }?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>
