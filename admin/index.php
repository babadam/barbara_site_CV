<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container">
    <div class="row">
        <h1>Accueil</h1>
        <h2>Admin Baba</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <p>Il y a 3 compétences</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Liste des compétences</p>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Compétences</th>
                            <th>Niveau en %</th>
                            <th>Supression</th>
                            <th>Modification</th>
                        </tr>
                        <tr>
                            <td>Ping-pong</td>
                            <td>30</td>
                            <td>
                                <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success btn-block">Modifier</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Changement de couche</td>
                            <td>80</td>
                            <td><button type="submit" class="btn btn-danger btn-block">Supprimer</button></td>
                            <td><button type="submit" class="btn btn-success btn-block">Modifier</button></td>
                        </tr>
                        <tr>
                            <td>Biberon</td>
                            <td>94</td>
                            <td><button type="submit" class="btn btn-danger btn-block">Supprimer</button></td>
                            <td><button type="submit" class="btn btn-success btn-block">Modifier</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="panel panel-info">
                <div class="panel-heading">
                        <p>Insertion d'une compétence</p>
                </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="competence">Compétence</label>
                            <input type="text" class="form-control" id="competence" name="competence" placeholder="Insérez votre compétence">
                        </div>
                        <div class="form-group">
                            <label for="c_niveau">Niveau</label>
                            <input type="text" class="form-control" id="c_niveau" name="c_niveau "placeholder="Insérez un niveau">
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
            <?php include('inc/footer.inc.php'); ?>
