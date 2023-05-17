<?php
session_start();
if (isset($_GET['action']) && !empty($_GET['action'])) {

    require('./co_bdd.php');
    require('./function.php');

    if ($_GET['action'] == 'inscr') {
       
        if (isset($_POST['mail']) && isset($_POST['password'])) {
            $userExisteOuNon = getUserMail($bdd, $_POST['mail']);
            if (!$userExisteOuNon) {
                postUsers($bdd, $_POST['mail'], $_POST['password'],$_POST['nombreConvive']);
                
                $newUser = getUserMail($bdd, $_POST['mail']);
                postAllergie($bdd, $newUser['id'], $_POST['allergie']);
                if ($_POST['allergie'] != null) {
                    $allergies = $_POST['allergie'];
                    $_SESSION['user']['allergie'] = $allergies;
                }
                $_SESSION['user']['id'] = $newUser['id'];
                $_SESSION['user']['mail'] = $newUser['mail'];
                $_SESSION['user']['grade'] = $newUser['grade'];
                $_SESSION['user']['nombreConvive'] = $newUser['nombreConvive'];
              


            
                header('location: ../index.php');

            } else {
                header('location: ../connexion.php');
            }
        }
    } elseif ($_GET['action'] == 'conn') {
        if (isset($_POST['mail']) && isset($_POST['password'])) {
            $userExisteOuNon = getUserMail($bdd, $_POST['mail']);
            if ($userExisteOuNon) {
                if (password_verify($_POST['password'], $userExisteOuNon['password'])) {


                    $listeAllergie = getAllergie($bdd, $userExisteOuNon['id']); 

                    if ($listeAllergie['allergie']) {
                        $allergies = $listeAllergie['allergie'];
                        $_SESSION['user']['allergie'] = $allergies;
                    }
                    $_SESSION['user']['id'] = $userExisteOuNon['id'];
                    $_SESSION['user']['mail'] = $userExisteOuNon['mail'];
                    $_SESSION['user']['grade'] = $userExisteOuNon['grade'];
                    $_SESSION['user']['nombreConvive'] = $userExisteOuNon['nombreConvive'];


                    $_SESSION['user']['id'] = $userExisteOuNon['id'];
                    $_SESSION['user']['mail'] = $userExisteOuNon['mail'];
                    $_SESSION['user']['grade'] = $userExisteOuNon['grade'];

                    if ($userExisteOuNon['grade'] == 1) {
                        header('location: ../index.php');
                    } else {
                        header('location: ../admin/index.php');
                    }
                } else {
                    header('location: ../connexion.php?err=mdp');
                }
            }
        }
    }
}
