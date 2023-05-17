<?php 
if(isset($_GET['action']) && $_GET['action'] == "add"){

if(isset($_POST['titre']) && !empty($_POST['titre'])){
    require('./co_bdd.php');
    if ($_FILES['image']['error'] == 0) {
        if (in_array(mime_content_type($_FILES['image']['tmp_name']), ['image/png', 'image/jpeg'])) {
            if ($_FILES['image']['size'] <= 3000000) {
                $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $imageFileName);
                $req = "INSERT INTO galeries (titre,image) VALUES (?,?)"; 
                $req = $bdd -> prepare($req); 
                $req -> execute([
                    $_POST['titre'], 
                    $imageFileName
                ]); 
                header('location: ../galeries.php'); 
            }
        }

    }
}
}elseif(isset($_GET['action']) && $_GET['action'] == "modif"){
   
 require('./co_bdd.php');
 require('../functions.php'); 
 $galerie = getGalerie($bdd,$_POST['id']); 
 $imageFileName = $galerie['image']; 
  if ($_FILES['image']['error'] == 0) {
        if (in_array(mime_content_type($_FILES['image']['tmp_name']), ['image/png', 'image/jpeg'])) {
            if ($_FILES['image']['size'] <= 3000000) {
                $imageFileName = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $imageFileName);
               
            }
        }

    }
    $req = "UPDATE galeries SET titre = ?,image = ? WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $_POST['titre'], 
        $imageFileName,
        $_POST['id']
    ]); 
    header('location: ../galeries.php'); 
}else{
    header('location: ../galeries.php'); 
}