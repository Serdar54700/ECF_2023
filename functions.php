<?php 

function getGaleries($bdd){
    $req = "SELECT * FROM galeries"; 
    $req = $bdd -> query($req); 
    $galeries = $req -> fetchAll(); 
    return $galeries; 
}
function getCategoriesPlat($bdd)
{
    // Requête pour récupérer toutes les catégories avec PDO
    $sql_categories = "SELECT id, categorie FROM categorie";
    $stmt_categories = $bdd->prepare($sql_categories);
    $stmt_categories->execute();
    $categories = $stmt_categories->fetchAll();
    return $categories;

}

function getPlatsParRapportAuCategorie($bdd,$id_categorie){
    // Requête pour récupérer les produits de la catégorie avec PDO
    $sql_produits = "SELECT * FROM plats WHERE id_categorie=:id_categorie";
    $stmt_produits = $bdd->prepare($sql_produits);
    $stmt_produits->execute([':id_categorie' => $id_categorie]);
    $produits = $stmt_produits->fetchAll();
    return $produits; 
}


function getAllAllergie($bdd){
    $req = "SELECT * FROM allergies";
    $req = $bdd->query($req);
    $allergies = $req->fetchAll();
    return $allergies;
}


function getHorraire($bdd){
    $req = "SELECT * FROM horaire";
    $req = $bdd->query($req);
    $horraire = $req->fetchAll();
    return $horraire;
}