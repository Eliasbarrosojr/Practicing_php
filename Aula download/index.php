<?php

$link = "https://wonderfulengineering.com/wp-content/uploads/2014/10/image-wallpaper-15-1024x768.jpg";

$content = file_get_contents($link);

$parse = parse_url($link);

$nameFile = basename($parse["path"]);

$file = fopen($nameFile, "w+");

fwrite($file, $content);
fclose($file);

?>

<img src="<?=$nameFile?>" >