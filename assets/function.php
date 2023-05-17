<?php 

function postUsers($bdd,$mail,$password,$nombreConvive)
{
    $req = "INSERT INTO users(mail,password,grade,nombreConvive) VALUES(?,?,?,?)";
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $mail,
        password_hash($password,PASSWORD_BCRYPT), 
        1,
        $nombreConvive
    ]);

}
function postAllergie($bdd, $id, $allergie)
{
    $req = "INSERT INTO userallergie(id_users,allergie) VALUES(?,?)";
    $req = $bdd->prepare($req);
    $req->execute([
        $id,
        $allergie
    ]);
}
function getAllergie($bdd, $id)
{
    $req = "SELECT * FROM users INNER JOIN userallergie ON userallergie.id_users = users.id WHERE id = ?";
    $req = $bdd->prepare($req);
    $req->execute([
        $id
    ]);
    $allergie = $req->fetch();
    return $allergie;
}
function getUser($bdd,$id)
{
    $req = "SELECT * FROM users WHERE id = ?"; 
    $req = $bdd -> prepare($req); 
    $req -> execute([
        $id
    ]); 
    $user = $req -> fetch(); 
    return $user; 
}

function getUserMail($bdd, $mail)
{
    $req = "SELECT * FROM users WHERE mail = ?";
    $req = $bdd->prepare($req);
    $req->execute([
        $mail
    ]);
    $user = $req->fetch();
    return $user;
}


function getMardi($bdd)
{
    $req = "SELECT * FROM horaire WHERE jours = 'mardi'";
    $req = $bdd->query($req);
    $mardi = $req->fetch();
    return $mardi;
}
function getLundi($bdd)
{
    $req = "SELECT * FROM horaire WHERE jours = 'lundi'";
    $req = $bdd->query($req);
    $lundi = $req->fetch();
    return $lundi;
}
function getMercredi($bdd)
{
    $req = "SELECT * FROM horaire WHERE jours = 'mercredi'";
    $req = $bdd->query($req);
    $mercredi = $req->fetch();
    return $mercredi;
}
function getJeudi($bdd)
{
    $req = "SELECT * FROM horaire WHERE jours = 'jeudi'";
    $req = $bdd->query($req);
    $jeudi = $req->fetch();
    return $jeudi;
}
function getVendredi($bdd)
{
    $req = "SELECT * FROM horaire WHERE jours = 'vendredi'";
    $req = $bdd->query($req);
    $vendredi = $req->fetch();
    return $vendredi;
}
function getSamedi($bdd)
{
    $req = "SELECT * FROM horaire WHERE jours = 'samedi'";
    $req = $bdd->query($req);
    $samedi = $req->fetch();
    return $samedi;
}
function getDimanche($bdd)
{
    $req = "SELECT * FROM horaire WHERE jours = 'dimanche'";
    $req = $bdd->query($req);
    $dimanche = $req->fetch();
    return $dimanche;
}

