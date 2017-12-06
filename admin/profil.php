<?php
include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $pseudo = $_SESSION['pseudo'];

    // echo $_SESSION['connexion']; test fonctionne

}else{ // l'utilisateur n'est pas connecté
    header('location: connexionAdmin.php');
} // fun du if isset




$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

// requête pour compter les expériences
$resultat = $pdoCV -> prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '$id_utilisateur'");
$resultat -> execute();
$nbr_experiences =  $resultat -> rowCount();

// requête pour compter les réalisations
$resultat = $pdoCV -> prepare("SELECT * FROM t_realisations WHERE utilisateur_id = '$id_utilisateur'");
$resultat -> execute();
$nbr_realisations =  $resultat -> rowCount();

// requête pour compter les formations
$resultat = $pdoCV -> prepare("SELECT * FROM t_formation WHERE utilisateur_id = '$id_utilisateur'");
$resultat -> execute();
$nbr_formations =  $resultat -> rowCount();

// requête pour compter les competences
$resultat = $pdoCV -> prepare("SELECT * FROM t_competences WHERE utilisateur_id = '$id_utilisateur'");
$resultat -> execute();
$nbr_competences =  $resultat -> rowCount();

// requête pour compter les loisirs
$resultat = $pdoCV -> prepare("SELECT * FROM t_loisirs WHERE utilisateur_id = '$id_utilisateur'");
$resultat -> execute();
$nbr_loisirs =  $resultat -> rowCount();



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
                                <li><a href="modif_utilisateurs.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></li>
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
