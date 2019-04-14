<?php
require_once "connect.php";

// Requete pour verifier si le chemin est déja dans la db
function get_urls (\PDO $pdo,$source_url) {
    $get_right_size = "SELECT 
                    `mobile_size`,
                    `desktop_size`,
                    `tablet_size`
                  FROM
                    `images`
                  WHERE
                    original_size = :original_size;";

    $stmt1 = $pdo->prepare($get_right_size);
    $stmt1->bindValue(":original_size", $source_url);
    $stmt1->execute();
    return $urls = $stmt1->fetch(\PDO::FETCH_ASSOC);
}


// Enregistrement du chemin et des differentes tailles d'images !!!!! A modifier lorsque la fonction de resize d'image sera prete

function AddUrl (\PDO $pdo , $desktop_url , $source_url) {
    $save_new_url = "INSERT INTO   `images`
                        (
                         `original_size`,
                         `mobile_size`,
                         `tablet_size`,
                         `desktop_size`
                         )
                    VALUES 
                        (
                         :original_size,
                         :mobile_size,
                         :tablet_size,
                         :desktop_size
                         )
                  ;";

    $stmt2 = $pdo->prepare($save_new_url);
    $stmt2->bindValue(":original_size", $source_url);
    $stmt2->bindValue(":mobile_size", $desktop_url);
    $stmt2->bindValue(":tablet_size", $desktop_url);
    $stmt2->bindValue(":desktop_size", $desktop_url);
    $stmt2->execute();
}



