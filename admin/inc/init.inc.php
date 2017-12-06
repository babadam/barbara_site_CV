<?php

$msg_erreur='';
$page='';

// connexion à la session
session_start();

// connexion BDD
$hote='localhost';
$bdd='site_cv';
$utilisateur='root';
$passe='';


$pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe);
$pdoCV -> exec("SET NAMES utf8");

$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC);



require('fonctions.inc.php');
