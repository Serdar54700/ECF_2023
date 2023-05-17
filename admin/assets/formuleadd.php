<?php 

if(isset($_POST['idMenu']) && is_numeric($_POST['prix'])){
    require('./co_bdd.php');
    require('../functions.php');
    $req = "INSERT INTO formules (titre,description,prix,id_menus) VALUES (?,?,?,?)"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $_POST['titre'], 
        $_POST['description'], 
        $_POST['prix'], 
        $_POST['idMenu']
    ]);

    header('location: ../formuleadd.php?id='.$_POST['idMenu']); 
}else{
    header('location: ../formuleadd.php?id=' . $_POST['idMenu']); 
}