<?php
require_once "connect.php";

// Requete pour verifier si le chemin est déja dans la db
function getUrls (\PDO $pdo,$sourceUrl) {
    $getRightSize = "SELECT 
                    `mobile_size`,
                    `desktop_size`,
                    `tablet_size`
                  FROM
                    `images`
                  WHERE
                    original_size = :original_size;";

    $stmt1 = $pdo->prepare($getRightSize);
    $stmt1->bindValue(":original_size", $sourceUrl);
    $stmt1->execute();
    return $urls = $stmt1->fetch(\PDO::FETCH_ASSOC);
}


// Enregistrement du chemin et des differentes tailles d'images !!!!! A modifier lorsque la fonction de resize d'image sera prete

function addUrls (\PDO $pdo , $urlStructure , $sourceUrl) {
    $saveNewUrl = "INSERT INTO   `images`
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

    $stmt2 = $pdo->prepare($saveNewUrl);
    $stmt2->bindValue(":original_size", $sourceUrl);
    $stmt2->bindValue(":mobile_size", $urlStructure);
    $stmt2->bindValue(":tablet_size", $urlStructure);
    $stmt2->bindValue(":desktop_size", $urlStructure);
    $stmt2->execute();
}



