<?php

try {
    // On se connecte à MySQL
    $global_bde = new PDO('mysql:host=;global.bde.studisys.net;name=globlal_bde;charset=utf8', 'global_bde', 'global_bde');
    $global_bde->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>
