<?php 
if(isset($_GET['id'])){
    require('./co_bdd.php'); 
    require('../functions.php');
    deleteMenu($bdd,$_GET['id']); 
    header('location: ../menus.php'); 
    exit; 
}