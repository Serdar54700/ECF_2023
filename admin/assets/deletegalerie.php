<?php 
if(isset($_GET['id'])){
    require('./co_bdd.php'); 
    require('../functions.php');
    deleteGalerie($bdd,$_GET['id']); 
    header('location: ../galeries.php'); 
    exit; 
}