<?php

header("Content-type: image/jpeg");

$file = "baixados.jpeg";

$new_width = 256;
$new_height = 256;

getimagesize($file);

list($old_width, $old_heigth) = getimagesize($file);

$new_image = imagecreatetruecolor($new_width, $new_height);
$old_image = imagecreatefromjpeg($file);


imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_heigth);

imagejpeg($new_image);

imagedestroy($old_image);
imagedestroy($new_image);

?>