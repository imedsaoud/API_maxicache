<?php
require_once "../data/data.php";
require_once "functionlogic.php";



$device_type = get_device(); // Type de device

if ($device_type === 'desktop') {
  $right_url_size = $row['desktop_size'];
}elseif($device_type === 'mobile'){
  $right_url_size = $row['mobile_size'];
} else {
  $right_url_size = $row['tablet_size'];
}

echo $right_url_size ;










