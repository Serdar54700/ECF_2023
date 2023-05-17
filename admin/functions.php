<?php 

function getGaleries($bdd){
    $req = "SELECT * FROM galeries"; 
    $req = $bdd -> query($req); 
    $galeries = $req -> fetchAll(); 
    return $galeries; 
}

function getGalerie($bdd,$id){
    $req = "SELECT * FROM galeries WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $id
    ]); 
    $galerie = $req -> fetch(); 
    return $galerie; 
}


function deleteGalerie($bdd,$id){
    $req = "DELETE FROM galeries WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([$id]); 
}



function getCategories($bdd){
    $req = "SELECT * FROM categorie"; 
    $req = $bdd -> query($req); 
    $categories = $req -> fetchAll(); 
    return $categories; 
}

function deleteCategorie($bdd,$id){
    $req = "DELETE FROM categorie WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([$id]); 
}

function getCategorie($bdd,$id){
    $req = "SELECT * FROM categorie WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $id
    ]); 
    $categorie = $req -> fetch(); 
    return $categorie; 
}





function getPlats($bdd){
    $req = "SELECT plats.*,categorie.categorie FROM plats INNER JOIN categorie ON categorie.id = plats.id_categorie"; 
    $req = $bdd -> query($req); 
    $plats = $req -> fetchAll(); 
    return $plats; 
}

function getPlat($bdd,$id){
    $req = "SELECT plats.*,categorie.categorie FROM plats INNER JOIN categorie ON categorie.id = plats.id_categorie WHERE plats.id = ?"; 

    $req = $bdd -> prepare($req); 
    $req -> execute([
        $id
    ]); 
    $plat = $req -> fetch(); 
    return $plat; 
}

function deletePlat($bdd,$id){
    $req = "DELETE FROM plats WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([$id]); 
}






function getMenus($bdd){
    $req = "SELECT * FROM menus"; 
    $req =$bdd -> query($req); 
    $menus = $req -> fetchAll(); 
    return $menus; 
}

function getMenu($bdd,$id)
{
    $req = "SELECT * FROM menus WHERE menus.id = ?";
    $req = $bdd->prepare($req);
    $req -> execute([$id]); 
    $menu = $req->fetch();
    return $menu;
}

function deleteMenu($bdd,$id){
    $req = "DELETE FROM menus WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([$id]); 
}

function getMenuAndFormules($bdd,$id)
{
    $req = "SELECT formules.*, menus.id as mid FROM formules INNER JOIN menus ON menus.id = formules.id_menus WHERE formules.id_menus = ?";
    $req = $bdd->prepare($req);
    $req -> execute([
        $id
    ]); 
    $formules = $req->fetchAll();
    return $formules;  
}

function deleteFormule($bdd,$id){
    $req = "DELETE FROM formules WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $id
    ]);
}



function getHoraireJour($bdd, $jour)
{
    $req = "SELECT * FROM horaire WHERE jours = ?";
    $req = $bdd->prepare($req);
    $req->execute([
        $jour
    ]);
    $horaire = $req->fetch();
    return $horaire;
}


function getPlaceDispoBase($bdd){
    $req = "SELECT place FROM place WHERE modif = 0";
    $req = $bdd->query($req);
    $placeDispoBase = $req->fetch();
    return $placeDispoBase; 
}