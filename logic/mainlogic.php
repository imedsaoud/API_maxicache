<?php
require_once "../data/data.php";
require_once "functionlogic.php";


$uri = $_SERVER['REQUEST_URI'] ?? 'NOT NULL';
$sourceUrl = getSourceUrl($uri);
$deviceType = getDevice(); // Device De l'utilisateur

$urls = getUrls($pdo, $sourceUrl); // Retourne un tableau avec les 3 Chemin si l'url_source est présente en db



if($urls) {
    $rightUrl = "../images/" .  getRightImageName($urls);
    returnImg($rightUrl); // On affiche l'image à la bonne taille
} else {
    dirImgSave($sourceUrl , $deviceType); // Save l'image dans le serv
    $Urlstructure = $deviceType . basename($sourceUrl); // On ajoutera ce chemin 3 fois en attendant la fonction avec les 3 variables contenant les 3 chemins
    AddUrls($pdo,$Urlstructure, $sourceUrl ); // !!!!!! Rajouter les parametres quand la fonction de resize sera terminer | On enregistre le meme chemin pour le moment !!!!!!!!!!!!!!
    $rightUrl = "../images/" . getRightImageName(getUrls($pdo,$sourceUrl));
    returnImg($rightUrl);
}


































