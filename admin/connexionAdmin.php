<?php

require_once('inc/init.inc.php');
require_once('inc/fonctions.inc.php');


//Traitement pour la deconnexion de l'admin
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    // unset($_SESSION['t_utilisateurs']);
    // header('location: connexionAdmin.php');
    $_SESSION['connexion']=''; // on vide les variables de SESSION
    $_SESSION['id_utilisateur']='';
    $_SESSION['prenom']='';
    $_SESSION['nom']='';
    $_SESSION['pseudo']='';

    unset($_SESSION['connexion']); // connexion = name du bouton submit
    session_destroy();
    header('location: ../accueil_pro.php');
}


if(isset($_POST['connexion'])){ // on envoie le form avec le name du boutton
    $pseudo = addslashes($_POST['pseudo']);
    $mdp = addslashes($_POST['mdp']);
    $sql = $pdoCV -> prepare("SELECT * FROM t_utilisateurs WHERE pseudo = '$pseudo' && mdp='$mdp' ");
    $sql -> execute();
    $nbr_utilisateur = $sql -> rowCount(); // on compte si l'utilisateur est dans la table. 1 TRUE 0 FALSE

    if($nbr_utilisateur == 0){ // L'utilisateur n'est pas dans la BDD
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Veuillez renseigner un pseudo et un mot de passe !</div>';
    }else{ // L'utilisateur est dans la BDD
        $ligne_utilisateur = $sql -> fetch(); // on cherche ses infos
        $_SESSION['connexion']='connecté';
        $_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur']; // on met dans la SESSION les infos de l'utilisateur
        $_SESSION['prenom']=$ligne_utilisateur['prenom']; // on met dans la SESSION les infos de l'utilisateur
        $_SESSION['nom']=$ligne_utilisateur['nom']; // on met dans la SESSION les infos de l'utilisateur
        $_SESSION['pseudo']=$ligne_utilisateur['pseudo']; // on met dans la SESSION les infos de l'utilisateur

        header('location: profil.php');
    } // ferme le if else
}// ferme le if isset



$page = 'Connexion';
require_once('inc/header.inc.php');
?>
    <nav class="navbar navbar-default couleur"></nav>
<!-- Contenu HTML -->
    <h1>Connexion</h1>
    <div class="container">
        <div class="row">
        <?= $msg_erreur ?>
        <form method="post" action="connexionAdmin.php">
            <div class="col-xs-12 col-sm-6 col-md-offset-3 col-md-6 col-sm-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body" id="connexion">
                        <div class="form-group">
                            <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
                        </div>
                        <!-- <button type="submit" name="connexion">Connexion</button> -->
                            <input type="submit" class="btn btn-primary btn-block couleur" value="Connexion" name=connexion>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div><!-- /.container -->

<?php
require_once('inc/footer.inc.php');
?>
