<?php
require_once('Allergie.php');

if (isset($_POST['nom_allergie'])) {
    $nom_allergie = $_POST['nom_allergie'];
    $allergie = new Allergie($nom_allergie);
    $allergie->ajouterAllergie();
    header('location: ../allergie.php');
    exit; 
}