<?php 
if(isset($_GET['id'])){
    require('./co_bdd.php'); 
    require('../functions.php');
    deletePlat($bdd,$_GET['id']); 
    header('location: ../plats.php'); 
    exit; 
}