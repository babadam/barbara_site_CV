<?php
require_once('admin/inc/init.inc.php');

$competences = $pdoCV -> query("SELECT * FROM t_competences WHERE utilisateur_id = 1");
$ligne_competence = $competences -> fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($ligne_competence);
// echo '</pre>';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Site public -<?= $ligne_utilisateur['prenom'] ?></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Francois+One|Josefin+Sans|Oswald" rel="stylesheet">
    </head>
    <body>
        <nav id="navigation" role="navigation" class="navigation">
            <a href="#slide2" class="js-scrollTo">Compétences</a>
            <a href="#slide3" class="js-scrollTo">Réalisations</a>
            <a href="#slide4" class="js-scrollTo">Experiences</a>
            <a href="#slide5" class="js-scrollTo">Contact</a>
            <a href="#" class="js-scrollTo">Loisirs</a>
            <a href="#" class="js-scrollTo">Réseaux</a>
        </nav>
        <!-- bouton pour nav responsive -->
        <div class="main" role="main">
          <button class="nav-button" role="button" type="button" aria-label="navigation"></button>
        </div>

        <main>
            <div id="slide1">
                <div class="slide_inside">
                    <h1>Barbara Tousverts </h1>
                    <p class="typed"><span id="holder"></span><span class="blinking-cursor">|</span></p>
                </div> <!--fin .slide_inside-->
            </div> <!--fin #slide1-->

            <div id="slide2">
                <div class="slide_inside">
                    <h2>Compétences</h2>
                    <div class="conteneur">
                        <div class="competence">
                            <div class="icone_competence">
                                <span><i class="fa fa-code" aria-hidden="true"></i></span>
                            </div>
                            <div class="texte_competence">
                                <h3>Intégration</h3>
                                <?php
                                    for($i = 0; $i < count($ligne_competence); $i++ ){
                                        // echo '<pre style="color: black; background-color:white;">';
                                        // print_r($ligne_competence[$i]);
                                        // echo '</pre>';
                                        if($ligne_competence[$i]['categorie'] == 'dev_front'){
                                            echo '<p>';
                                            echo $ligne_competence[$i]['competence'];
                                            echo '</p>';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="competence">
                            <div class="icone_competence">
                                <span><i class="fa fa-cogs" aria-hidden="true"></i></span>
                            </div>
                            <div class="texte_competence">
                                <h3>Développement</h3>
                                <?php
                                    for($i = 0; $i < count($ligne_competence); $i++ ){
                                        // echo '<pre style="color: black; background-color:white;">';
                                        // print_r($ligne_competence[$i]);
                                        // echo '</pre>';
                                        if($ligne_competence[$i]['categorie'] == 'dev_back'){
                                            echo '<p>';
                                            echo $ligne_competence[$i]['competence'];
                                            echo '</p>';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="competence">
                            <div class="icone_competence">
                                <span><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                            </div>
                            <div class="texte_competence">
                                <h3>Framework</h3>
                                <?php
                                    for($i = 0; $i < count($ligne_competence); $i++ ){
                                        // echo '<pre style="color: black; background-color:white;">';
                                        // print_r($ligne_competence[$i]);
                                        // echo '</pre>';
                                        if($ligne_competence[$i]['categorie'] == 'framework'){
                                            echo '<p>';
                                            echo $ligne_competence[$i]['competence'];
                                            echo '</p>';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div> <!--.slide_inside-->
            </div> <!--#slide2-->

            <div id="slide3">
                <div class="slide_inside">
                    <h2>Réalisations</h2>
                    <div class="polaroid-images">
                        <a href="" title="Cave"><img height="200" src="img/site_cv.png" alt="Site CV" title="site cv" /></a>
                        <a href="" title="Cave"><img height="200" src="img/site_html.png" alt="Site HTML" title="site html/css" /></a>
                        <a href="" title="Cave"><img height="200" src="img/site_client.png" alt="Site client" title="site client" /></a>
                    </div>
                </div> <!--.slide_inside-->
            </div>
            <div id="slide4">
                <div class="slide_inside">
                    <h2>Expériences</h2>
                </div> <!--.slide_inside-->
            </div>
            <div id="slide5">
                <div class="slide_inside">
                    <h2>Contact</h2>
                    <div class="contact">
                        <div class="info">
                            <h3>Contactez-moi</h3>
                            <div class="me">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <p>Barbara Tousverts</p>
                                <p>Colombes</p>
                            </div>
                            <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p>06.63.57.70.89</p>
                            </div>
                            <div class="email">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <p>barbara.tousverts@live.fr</p>
                            </div>
                        </div>
                        <div class="form-container">
                            <form class="form-contact" action="" method="post">

                                <input type="text" name="nom" id="nom" value="" placeholder="Nom"><br>

                                <input type="email" name="email" id="email" value="" placeholder="Email"><br>

                                <input type="text" name="phone" id="phone" value="" placeholder="Téléphone"><br>

                                <input type="text" name="sujet" id="sujet" value="" placeholder="Sujet"><br>

                                <textarea name="message" rows="8" cols="40" id=message placeholder="Message"></textarea>

                                <input type="submit" name="" value="Envoyer">
                            </form>
                        </div>
                    </div>
                </div> <!--.slide_inside-->
            </div>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>
