<?php

try {
    // On se connecte à MySQL
    $local_bdd = new PDO('mysql:host=orleans.bde.studisys.net;port=40001;name=orleans_bde;charset=utf8', 'orleans_wadm', '892F51a1');
    $local_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>
