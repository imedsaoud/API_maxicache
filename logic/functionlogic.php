<?php

require_once "libs/device_detect.php";




// Recuperation de l'url source

function get_source_url() {
    $url = $_SERVER['REQUEST_URI'] ?? 'NOT NULL'; // Récuperation de l'url
    $source_adress = explode("///", $url);
    $final_url = $source_adress[1] ;
    return $final_url; // Return l'url de la source sans le https://
}

// Recuperation du type de device

function get_device () {
  $detect = new Mobile_Detect; // Nouvelle instance de détection
  $mob = $detect->isMobile(); // Si c'est un mobile return true
  $tab = $detect->isTablet(); // Si c'est une tablette return true

  if ($tab){
    $device_type = "tablet";
  }
  elseif($mob){
    $device_type = "mobile";
  }
  else{
    $device_type = "desktop";
  }    
  return $device_type;
}


// Retourne le Nom du fichier en fonction du device de l'utilisateur
function right_size_name_image (array $urls): string{
    $device_type = get_device(); // Type de device

    if ($device_type === 'desktop') {
        $right_size_url = $urls['desktop_size'];
    }elseif($device_type === 'mobile'){
        $right_size_url = $urls['mobile_size'];
    } else {
        $right_size_url = $urls['tablet_size'];
    }

    return $right_size_url ;
}

// Renvoie la bonne image a l'utilisateur

function return_right_img ($right_url) {
    //ouvrir un fichier en mode binaire

    $handle = fopen($right_url, 'rb');

    // On renvoie les bons en-tetes

    header("Content-Type: image/png");
    header("Content-Length: " . filesize($right_url));

    // Envoie le contenu du fichier, puis stoppe le script
    fpassthru($handle);

    exit;
}


function save_img_in_serv ($source_url, $device_type){
    $source_url_download = "https://". $source_url ;//Url complete du fichier a telecharger
    file_put_contents("../images/" . $device_type . basename($source_url),file_get_contents($source_url_download));
}














