<?php
if(isset($_POST['horaire']) && !empty($_POST['horaire']) && isset($_POST['jour']) && !empty($_POST['jour']) &&  isset($_POST['nombreCouvert']) && !empty($_POST['nombreCouvert'])){

    var_dump($_POST);
    require('./assets/co_bdd.php'); 

    $req = "SELECT * FROM place WHERE date = ?";
    $req = $bdd->prepare($req);
    $req->execute([
        $_POST['jour']
    ]);
    $retourDate = $req->fetch();

    $nombreDePlaceAInserer = $retourDate['place'] - $_POST["nombreCouvert"]; 
    $req = "UPDATE place set place = ?, modif = ? WHERE id = ?";
    $req = $bdd->prepare($req);
    $req->execute([
        $nombreDePlaceAInserer,
        1,
        $retourDate['id']
    ]);
    header('location: ./success.php'); 

}else{
    header('location: ./error.php');

}