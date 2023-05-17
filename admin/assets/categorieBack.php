<?php 
if(isset($_GET['action']) && $_GET['action'] == "add"){

if(isset($_POST['titre']) && !empty($_POST['titre'])){
    require('./co_bdd.php');

                $req = "INSERT INTO categorie (categorie) VALUES (?)"; 
                $req = $bdd -> prepare($req);
                $req -> execute([
                    $_POST['titre']
                ]); 
                header('location: ../categories.php'); 
           

    
}
}elseif(isset($_GET['action']) && $_GET['action'] == "modif"){
   
 require('./co_bdd.php');
 require('../functions.php'); 
 $galerie = getCategorie($bdd,$_POST['id']); 

    $req = "UPDATE categorie SET titre = ? WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $_POST['titre'], 
        $imageFileName,
        $_POST['id']
    ]); 
    header('location: ../categories.php'); 
}else{
    header('location: ../categories.php'); 
}