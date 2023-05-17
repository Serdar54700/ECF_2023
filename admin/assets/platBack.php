<?php 
if(isset($_GET['action']) && $_GET['action'] == "add"){

if(isset($_POST['titre']) && !empty($_POST['titre'])){
    require('./co_bdd.php');
  
      
                $req = "INSERT INTO plats (titre,description,prix,id_categorie) VALUES (?,?,?,?)"; 
                $req = $bdd -> prepare($req); 
                $req -> execute([
                    $_POST['titre'],
                    $_POST['description'], 
                    $_POST['price'],  
                    $_POST['id_categorie']
                ]); 
                header('location: ../plats.php'); 
         
           
 }

}elseif(isset($_GET['action']) && $_GET['action'] == "modif"){
   
 require('./co_bdd.php');
 require('../functions.php'); 
 $plat = getPlat($bdd,$_POST['id']); 
 
  
    $req = "UPDATE plats SET titre = ?,description = ?,prix = ?, id_categorie = ?  WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $_POST['titre'],
        $_POST['description'], 
        $_POST['price'],  
        $_POST['id_categorie'],
        $_POST['id']
    ]); 
    header('location: ../plats.php'); 
}else{
    header('location: ../plats.php'); 
}