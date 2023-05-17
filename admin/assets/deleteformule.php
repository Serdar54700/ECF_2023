<?php

if (isset($_GET['action']) && $_GET['action'] == "deleteFormule") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        require('./co_bdd.php');
        require('../functions.php');
        deleteFormule($bdd, $_GET['id']);
        header('location: ../formuleadd.php?id='.$_GET['idM']); 
    }
}