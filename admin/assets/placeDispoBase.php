<?php 
if(isset($_POST['nbr'])){
    require('./co_bdd.php');
    $req = "UPDATE place SET place=? WHERE modif = 0";
    $req = $bdd->prepare($req);
    $req->execute([
        $_POST['nbr']
    ]);
    header('location: ../horaire.php');
    exit;
}