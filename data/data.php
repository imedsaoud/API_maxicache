<?php
require_once "connect.php";
require_once "../logic/functionlogic.php";



/*
* $final_url = Url de la source
*/

$final_url = get_source_url($url); // Url de la source

// Requete pour verifier si le chemin est déja dans la db

$get_right_size = "SELECT 
                    `mobile_size`,
                    `desktop_size`,
                    `tablet_size`
                  FROM
                    `images`
                  WHERE
                    original_size = :original_size;";

$stmt1 = $pdo->prepare($get_right_size);
$stmt1->bindValue(":original_size", $final_url);
$stmt1->execute();
$row = $stmt1->fetch(\PDO::FETCH_ASSOC);

// Enregistrement du chemin et des differentes tailles d'images 

$save_new_url = "INSERT INTO   `images`
                    (original_size, mobile_size,tablet_size, desktop_size)
                  VALUES 
                    (:original_size, :mobile_size,:tablet_size,:desktop_size)
                  ;";

$stmt2 = $pdo->prepare($save_new_url);
$stmt2->bindValue(":original_size", $final_url);
$stmt2->bindValue(":mobile_size", $final_url); 
$stmt2->bindValue(":tablet_size", $final_url);
$stmt2->bindValue(":desktop_size", $final_url);

if(!$row){
  $stmt2->execute(); // Enregistre
}

