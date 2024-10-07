<?php

$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5, 450, 150, "Certificado", $titleColor);
imagestring($image, 5, 450, 350, "Nome ficticio", $titleColor);
imagestring($image, 3, 450, 370, "Certificado", $gray);

header("Content-type: image/jpeg");

imagejpeg($image, "Certificado-".date("Y-m-d").".jpg");

imagedestroy($image);
?>