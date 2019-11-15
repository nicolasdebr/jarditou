<?php

$fichier = 'jarditou_photos';

$files1 = scandir($fichier);
$files2= scandir($fichier,1);

print_r( $files1);
print_r($files2);

?>