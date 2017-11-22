<?php
include('inc/init.inc.php');


$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);



include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container-fluid">
    <div class="row">
        <h1><?= $ligne_utilisateur['prenom']?></h1>
        <!-- <h2>Admin Baba</h2> -->
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Profil de l'utilisateur</p>
                </div>
                <div class="container-fluid">


                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Pseudo</th>
                            <th>Age</th>
                            <th>Date de naissance</th>
                            <th>Civilité</th>
                            <th>Adresse</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Avatar</th>
                            <th>Modifier</th>
                        </tr>
                        <tr>

                           <td><?php echo $ligne_utilisateur['prenom'] ;?></td>
                           <td><?php echo $ligne_utilisateur['nom'] ;?></td>
                           <td><?php echo $ligne_utilisateur['email'] ;?></td>
                           <td><?php echo $ligne_utilisateur['telephone'] ;?></td>
                           <td><?php echo $ligne_utilisateur['pseudo'] ;?></td>
                           <td><?php echo $ligne_utilisateur['age'] ;?></td>
                           <td><?php echo $ligne_utilisateur['date_naissance'] ;?></td>
                           <td><?php echo $ligne_utilisateur['sexe'] ;?></td>
                           <td><?php echo $ligne_utilisateur['adresse'] ;?></td>
                           <td><?php echo $ligne_utilisateur['code_postal'] ;?></td>
                           <td><?php echo $ligne_utilisateur['ville'] ;?></td>
                           <td><?php echo $ligne_utilisateur['pays'] ;?></td>
                           <td><?php echo $ligne_utilisateur['avatar'] ;?></td>
                           <td><a href="modif_utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                       </tr>

                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <?php include('inc/footer.inc.php'); ?>
