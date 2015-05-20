<?php

$url = "http://joomlacode.org/gf/download/frsrelease/20021/162258/Joomla_3.4.1-Stable-Full_Package.zip";
$destination = __DIR__ . "/joomla-zip.zip";    

//DOWNLOAD
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
file_put_contents($destination, $data);

//UNZIP
$zip = new ZipArchive();
$res = $zip->open($destination);
if($res === TRUE){
   $zip->extractTo(__DIR__);
   $zip->close();
}

//BORRAR INSTALADOR
unlink($destination);
unlink(__FILE__);

//REDIRECCIONO
header("location: /");
