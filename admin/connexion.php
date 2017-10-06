<?php

$hote='localhost';
$bdd='site_cv';
$utilisateur='root';
$passe='';

$pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe);
$pdoCV -> exec("SET NAMES utf8");
