<?php

require_once('inc/init.inc.php');
require_once('inc/fonctions.inc.php');


// Traitement pour la déconnexion :
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){ // Si une action est demandée dans l'url et que cette action est "deconnexion" alors on procède à la deconnexion.
    unset($_SESSION['t_utilisateurs']);
    header('location: connexionAdmin.php');
}

// Traitement pour rediriger l'utilisateur s'il est déjà connécté
if(userConnecte()){
    header('location: profil.php');
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



//     // On vérifie que les deux champs ne sont pas vides
//     if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
//
//         // On connecte le membre en enregistrant ses infos dans la session
//         // -> Le membre existe-t-il en BDD ?
//         $sql = $pdoCV -> prepare("SELECT * FROM t_utilisateurs WHERE pseudo = :pseudo");
//         $sql -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
//         $sql -> execute();
//
//         if($sql -> rowCount() > 0){ // signifie que le pseudo est déja inscrit dans la BDD puisque supérieur à 0 donc pas nul
//
//
//             // -> Le MDP saisi correspond au pseudo en BDD
//             $membre = $sql -> fetch(PDO::FETCH_ASSOC); // On récupère toutes les infos du membre qui souhaite se connecter sous la forme d'un array
//             if($membre['mdp'] == $_POST['mdp']){ // si (mdp_crypte_en_bdd == mdp saisi + crypté... ALORS TOUT EST OK)
//                 // Tout est OK on peut connecter l'utilisateur
//                 foreach($membre as $indice => $valeur){
//                     if($indice != 'mdp'){
//                         $_SESSION['t_utilisateurs'][$indice] = $valeur;
//                     }
//                 }
//                 // debug($membre);
//
//                 // redirection
//                 header('location:profil.php');
//             }
//             else{
//                 $msg .= '<div class="alert alert-danger">Mot de passe erroné !</div>';
//             }
//         }
//
//
//         else{
//             $msg .= '<div class="alert alert-danger"> Le pseudo '. $_POST['pseudo'].' n\'est pas reconnu.</div>';
//         }
//
//     }// fin du if de verification si les deux champs ne sont pas vides
//     else{
//         $msg .= '<div class="alert alert-danger"> Veuillez renseigner un pseudo et un mot de passe !</div>';
//     }
//
//
//
// } // fin du if (!empty($_POST))


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
