<?php

require_once "libs/device_detect.php";




// Recuperation de l'url source

function getSourceUrl(string  $uri): string {
    $sourceUrl = explode("///", $uri);
    $finalUrl = $sourceUrl[1] ;
    return $finalUrl; // Return l'url de la source sans le https://
}

// Recuperation du type de device

function getDevice(): string {
  $detect = new Mobile_Detect; // Nouvelle instance de détection
  $mob = $detect->isMobile(); // Si c'est un mobile return true
  $tab = $detect->isTablet(); // Si c'est une tablette return true

  if ($tab){
      $deviceType = "tablet";
  } elseif($mob){
      $deviceType = "mobile";
  } else{
      $deviceType = "desktop";
  }    
  return $deviceType;
}


// Retourne le Nom du fichier en fonction du device de l'utilisateur
function getRightImageName (array $urls): string {
    $deviceType = getDevice(); // Type de device

    if ($deviceType === 'desktop') {
        $rightSizeUrl = $urls['desktop_size'];
    } elseif($deviceType === 'mobile'){
        $rightSizeUrl = $urls['mobile_size'];
    } else {
        $rightSizeUrl = $urls['tablet_size'];
    }

    return $rightSizeUrl ;
}

// Renvoie la bonne image a l'utilisateur

function returnImg (string $rightUrl) {
    //ouvrir un fichier en mode binaire

    $handle = fopen($rightUrl, 'rb');

    // On renvoie les bons en-tetes

    header("Content-Type: image/png");
    header("Content-Length: " . filesize($rightUrl));

    // Envoie le contenu du fichier, puis stoppe le script
    fpassthru($handle);

    exit;
}


function dirImgSave (string $sourceUrl, string $deviceType){
    $sourceUrlDownload = "https://". $sourceUrl ;//Url complete du fichier a telecharger
    file_put_contents("../images/" . $deviceType . basename($sourceUrl),file_get_contents($sourceUrlDownload));
}














