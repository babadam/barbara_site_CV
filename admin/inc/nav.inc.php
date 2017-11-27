<body>
    <nav class="navbar navbar-fixed-top navbar-inverse couleur"> <!--NAV-->
        <div class="container-fluid shadowNav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="profil.php"><?= $ligne_utilisateur['pseudo'] ?></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li class="dropdown"> <!-- menu déroulant Parcours-->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="experiences.php">Expériences</a></li>
                                <li><a href="realisations.php">Réalisations</a></li>
                                <li><a href="formations.php">Formations</a></li>
                            </ul>
                       </li>

                       <li class="dropdown"> <!--menu deroulant Compétences-->
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compétences <span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                 <li><a href="competences.php">Compétences</a></li>
                                 <li><a href="loisirs.php">Loisirs</a></li>
                                 <li><a href="#">Réseaux</a></li>
                             </ul>
                         </li>
                     </ul>

                     <!-- bouton déconnexion -->
                     <div class="nav navbar-nav navbar-right">
                         <!-- <ul class="nav navbar-nav"> -->
                            <a class="navbar-brand" href="connexionAdmin.php?action=deconnexion"><span class="glyphicon glyphicon-off" aria-hidden="true"></a>

                     </div>
                 </div>
             </div><!-- fin container fluid-->
        </nav>

    <section>
