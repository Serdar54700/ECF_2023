<?php5.2
$page = "connexion"; 

require('./assets/header.php');
if(isset($_SESSION['user'])){
    header('location: ./index.php'); 
}
$allergies = getAllAllergie($bdd); s

?>

<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">

            <h1 class="display-4 text-uppercase">Bienvenue chez Quai Antique</h1>
        </div>

    </div>



    <div class="container">
        <div class="row .d-flex justify-content-center bg flex-wrap">

            <div class="connexion col-5">

                <h1>Connexion </h1>
                <form action="./assets/co_b.php?action=conn" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">adresse email</label>
                        <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Connexion</button>
                </form>

            </div>

            <div class="col-5">
                <h1>Inscription </h1>
                <form action="./assets/co_b.php?action=inscr" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">adresse email</label>
                        <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre de convive</label>
                        <input type="number" name="nombreConvive" class="form-control" id="Nombre">
                    </div>

                        <div class="mb-3">
                            <h4>Avez-vous des allergies</h4>
                            <textarea name="allergie" class="form-control"></textarea>
                        </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>

            </div>

        </div>
    </div>




    <?php
    require('./assets/footer.php');
    ?>