<?php
session_start();

    $page = "crud";
    require('./assets/co_bdd.php');
    require('./functions.php');
$PlaceDispoBase = getPlaceDispoBase($bdd);

    require('./assets/header.php');
    ?>

    <style>
        .cardJour {
            width: 220px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            color: #000000;
            padding: 3.4rem;
            text-align: center;
            margin: 1rem;
        }

        .cardsJours {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;

        }
    </style>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper cardsJours">

            <a href="./modifhoraire.php?jour=lundi" class="cardJour">Lundi</a>
            <a href="./modifhoraire.php?jour=mardi" class="cardJour">Mardi</a>
            <a href="./modifhoraire.php?jour=mercredi" class="cardJour">Mercredi</a>
            <a href="./modifhoraire.php?jour=jeudi" class="cardJour">Jeudi</a>
            <a href="./modifhoraire.php?jour=vendredi" class="cardJour">Vendredi</a>
            <a href="./modifhoraire.php?jour=samedi" class="cardJour">Samedi</a>
            <a href="./modifhoraire.php?jour=dimanche" class="cardJour">Dimanche</a>


            
        </div>
  <div class="content-wrapper cardsJours">
            <div>

                <h4>Nombre de couverts dans la salle : <?= htmlspecialchars($PlaceDispoBase['place']) ?></h4>
                <p></p>

                <form action="./assets/placeDispoBase.php" method="post">
                    <input type="number" name="nbr" placeholder="Nombre de place" >
                    <input type="submit">
                </form>
            </div>
  </div>
    </div>

