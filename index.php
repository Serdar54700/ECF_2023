<?php
$page = "index";
require('./assets/header.php');

$galeries = getGaleries($bdd);
?>



<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">A propos de nous</h2>
            <h1 class="display-4 text-uppercase">Bienvenue chez Quai Antique</h1>
        </div>
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pb-5">

                <p class="mb-5">Notre restaurant est un endroit convivial et chaleureux où les clients peuvent profiter
                    d'une cuisine raffinée dans un
                    cadre élégant. Nous sommes fiers de proposer des plats frais et de saison, élaborés à partir
                    d'ingrédients locaux de
                    qualité. Que ce soit pour un dîner romantique, une soirée entre amis ou un repas d'affaires, notre
                    équipe attentionnée
                    vous accueillera avec le sourire et fera tout son possible pour rendre votre expérience culinaire
                    inoubliable. Venez
                    découvrir notre menu varié, nos vins soigneusement sélectionnés et notre ambiance unique qui ne
                    manquera pas de vous
                    séduire. Nous sommes impatients de vous accueillir !</p>
                <div class="row g-5">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4"
                            style="width: 90px; height: 90px;">
                            <i class="fa fa-heartbeat fa-2x text-white"></i>
                        </div>
                        <h4 class="text-uppercase">100% Fait maison</h4>
                        <p class="mb-0">Goûtez notre cuisine fait maison, préparée avec amour et passion</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4"
                            style="width: 90px; height: 90px;">
                            <i class="fa fa-award fa-2x text-white"></i>
                        </div>
                        <h4 class="text-uppercase">restaurant award</h4>
                        <p class="mb-0">Un voyage culinaire inoubliable dans notre restaurant étoilé</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid about py-5 pt-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">Nos menus</h2>
            <h1 class="display-4 text-uppercase">Explorez nos menus</h1>
        </div>
        <div class="tab-class text-center">

            <div class="tab-content">
                <div class="p-0">
                    <div class="row">

                        <?php

                        $menuQuery = $bdd->query("SELECT * FROM menus");
                        $menus = $menuQuery->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($menus as $menu) {
                            $idMenu = $menu['id'];
                            $formulesQuery = $bdd->prepare("SELECT * FROM formules WHERE id_menus = :idMenu");
                            $formulesQuery->execute(['idMenu' => $idMenu]);
                            $formules = $formulesQuery->fetchAll(PDO::FETCH_ASSOC);
                            ?>


<style>
    .formule{
       background-color:#ededed69;
       border: 7px;
    }
</style>

                            <div class="col-lg-12">


                                <div class="d-flex w-100 flex-column justify-content-center border-inner px-4">
                                    <h5 class="text-uppercase">
                                        <?= htmlspecialchars($menu['titre']) ?>
                                    </h5>
                                    <?php foreach ($formules as $formule) { ?>
                                        <div class="formule">

                                            <p>
                                                <?= htmlspecialchars($formule['titre']) ?>
                                            </p>
                                            <p>
                                                <?= htmlspecialchars($formule['description']) ?>
                                            </p>
                                            <p>
                                                <?= htmlspecialchars($formule['prix']) ?>€
                                            </p>
                                        </div>
                                        
                                        <?php
                                    }

                                    ?>
                                </div>
                                <hr>

                            </div>



                            <?php
                        }

                        ?>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>





<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">Notre galeries</h2>
            <h1 class="display-4 text-uppercase">Découvrez nous en images</h1>
        </div>
        <div class="row g-5">
            <?php foreach ($galeries as $galerie) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="./admin/uploads/<?= htmlspecialchars($galerie['image']) ?>"
                                alt="">
                            <style>
                                .titret {
                                    color: red;
                                }
                            </style>
                            <div
                                class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center justify-content-start">
                                    <h4 class="titret">
                                        <?= htmlspecialchars($galerie['titre']) ?>
                                    </h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>

            <a href="tables.php" class="btn btn-primary">Réserver une table</a>

        </div>
    </div>
</div>


<?php
require('./assets/footer.php');
?>