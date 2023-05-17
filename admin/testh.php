<?php


// $ouverture = 10; 
// $fermeture = 14;


// $start = "10:00"; // valeur de départ
// $end = "12:00"; // valeur de fin


// // convertir les valeurs en timestamps
// $start_timestamp = strtotime($start);
// $end_timestamp = strtotime($end);

// // afficher les valeurs toutes les 15 minutes
// for ($i = $start_timestamp; $i <= $end_timestamp; $i += 900) {
//     echo date("H:i:s", $i) . "<br>";
// }



$start = "2023-02-23 8:00:00"; // valeur de départ
$end = "2023-02-23 23:50:00"; // valeur de fin

// convertir les valeurs en timestamps
$start_timestamp = strtotime($start);
$end_timestamp = strtotime($end);
$now_timestamp = strtotime("now"); // timestamp actuel

// afficher les valeurs toutes les 15 minutes
for ($i = $start_timestamp; $i <= $end_timestamp; $i += 900) {
    if ($i >= $now_timestamp) { // ne pas afficher les valeurs passées
        ?>
        <button><?= date("Y-m-d H:i:s", $i) ?></button>
<?php
        
    }
}

?>
