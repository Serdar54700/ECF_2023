<?php
require_once 'Allergie.php';

if (isset($_POST['id'])) {
    $allergie = new Allergie('');
    $allergie->supprimerAllergie($_POST['id']);
}
header('Location: ../allergie.php');