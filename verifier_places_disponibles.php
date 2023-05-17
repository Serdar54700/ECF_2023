<?php
// Vérification du nombre de places disponibles
require('./assets/co_bdd.php');
$req = "SELECT * FROM places";
$req = $bdd->query($req);
$nbPlacesDisponibles = $req->fetch();

$nbPlacesDisponibles = $nbPlacesDisponibles['nombreDePlace']; 

// Envoi de la réponse au format texte
header('Content-Type: text/plain');
echo $nbPlacesDisponibles;
?>