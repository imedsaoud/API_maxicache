<?php
require_once "../data/data.php";
require_once "functionlogic.php";



$source_url = get_source_url(); // Url de la source
$device_type = get_device(); // Device De l'utilisateur
$urls = get_urls($pdo, $source_url); // Retourne un tableau avec les 3 Chemin si l'url_source est présente en db



if($urls) {
    $right_url = "../images/" .  right_size_name_image($urls);
    return_right_img($right_url);
} else {
    save_img_in_serv($source_url , $device_type); // Save l'image en local
    $desk_structure = $device_type . basename($source_url);
    AddUrl($pdo,$desk_structure, $source_url ); // !!!!!! Rajouter 4 parametres quand la fonction de resize sera terminer | On enregistre le meme chemin pour le moment !!!!!!!!!!!!!!
    $right_url = "../images/" . right_size_name_image(get_urls($pdo,$source_url));
    return_right_img($right_url);
}


































