<?php

if(isset($_GET['action']) && $_GET['action'] == "addMenu"){

if(isset($_POST['titre']) && !empty($_POST['titre'])){
    require('./co_bdd.php');
        $req = "INSERT INTO menus (titre) VALUES (?)"; 
        $req = $bdd -> prepare($req); 
        $req -> execute([
            $_POST['titre']
        ]); 
        header('location: ../menus.php'); 

    }
}