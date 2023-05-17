<?php 
if(isset($_GET['id'])){
    require('./co_bdd.php'); 
    require('../functions.php');
    deleteCategorie($bdd,$_GET['id']); 
    header('location: ../categories.php'); 
    exit; 
}