<?php
require('./assets/co_bdd.php');

$req = "SELECT * FROM place WHERE date = ?";
$req = $bdd->prepare($req);
$req->execute([
    $_GET['date']
]);

$retourDate = $req->fetch();


 
if($retourDate){
    $b = (int) $retourDate['place']; 
    echo json_encode($b);
    exit; 
}else{
    $req = "SELECT place FROM place WHERE modif = 0";
    $req = $bdd->prepare($req);
    $req->execute([
        $_GET['date']
    ]); 
    $placeDispoBase = $req->fetch();
if($placeDispoBase){
        $req = "INSERT INTO place (date,place,modif) VALUES (?,?,?)";
        $req = $bdd->prepare($req);
        $req->execute([
            $_GET['date'],
            $placeDispoBase['place'],
            0
        ]);
        echo json_encode($placeDispoBase['place']);
    }else{
        $req = "INSERT INTO place (date,place,modif) VALUES (?,?,?)";
        $req = $bdd->prepare($req);
        $req->execute([
            $_GET['date'],
            50,
            0
        ]);
        echo json_encode('50');
    }
  
}