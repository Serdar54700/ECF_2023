<?php
if (empty($_POST) && !isset($_POST)) {
    header('location: ../horaire.php');
    exit;
}
if (isset($_POST['fermerMatin']) && $_POST['fermerMatin'] == "on") {
    $ouvertureMatin = null;
    $fermetureMatin = null;
    $horaireMatin = null;
} else {
    $ouvertureMatin = $_POST['ouvertureMatin'];
    $fermetureMatin = $_POST['fermetureMatin'];
    $horaireMatin = $ouvertureMatin . '-' . $fermetureMatin;
}

if (isset($_POST['fermerAprem']) && $_POST['fermerAprem'] == "on") {
    $ouvertureAprem = null;
    $fermetureAprem = null;
    $horaireAprem = null;
} else {
    $ouvertureAprem = $_POST['ouvertureAprem'];
    $fermetureAprem = $_POST['fermetureAprem'];
    $horaireAprem = $ouvertureAprem . '-' . $fermetureAprem;
}


$horaireComplet;

if ($horaireMatin !== null && $horaireAprem !== null) {

    $horaireComplet = $horaireMatin . ',' . $horaireAprem;

} elseif ($horaireMatin !== null && $horaireAprem == null) {

    $horaireComplet = $horaireMatin;

} elseif ($horaireMatin == null && $horaireAprem !== null) {

    $horaireComplet = $horaireAprem;

} elseif ($horaireMatin == null && $horaireAprem == null) {

    $horaireComplet = null;

}

require('../assets/co_bdd.php');

$req = "UPDATE horaire SET matin = ?, aprem = ?, matinOuverture = ?, matinFermeture = ?, apremOuverture= ?, apremFermeture = ?,complet = ?  WHERE jours = ?";

$req = $bdd->prepare($req);
$req->execute([
    $horaireMatin,
    $horaireAprem,
    $ouvertureMatin,
    $fermetureMatin,
    $ouvertureAprem,
    $fermetureAprem,
    $horaireComplet,
    $_POST['jour']
]);


header('location: ../modifhoraire.php?jour=' . $_POST["jour"]);