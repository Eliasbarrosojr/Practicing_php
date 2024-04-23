<?php

$filename = "man.jpg";

$base64 = base64_encode(file_get_contents($filename));

$fileInfo = new finfo(FILEINFO_MIME_TYPE);

$mimeType = $fileInfo->file($filename);

$base64encode = "data:".$mimeType.";base64,".$base64;
?>

<a href="<?=$base64encode?>" target="_blank">Imagem.</a><br>
<img src="<?=$base64encode?>" height=200px width=200px>