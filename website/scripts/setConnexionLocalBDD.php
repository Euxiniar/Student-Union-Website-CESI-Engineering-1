<?php

try {
    // On se connecte à MySQL
    $local_bdd = new PDO('mysql:host=orleans.bde.studisys.net;name=orleans_bde;charset=utf8', 'global_bde', 'global_bde');
    $local_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>
