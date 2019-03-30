<?php

require_once "libs/device_detect.php";




//FONCTION RÉCUPERATION URL 

function get_source_url() {
    $url = $_SERVER['REQUEST_URI'] ?? 'NOT NULL'; // Récuperation de l'url 
    $source_adress = explode("///", $url);
    $final_url = $source_adress[1] ;
    return $final_url; // Return l'url de la source 
}

// FONCTION RECUPERATION DU TYPE DE DEVICE 

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





















