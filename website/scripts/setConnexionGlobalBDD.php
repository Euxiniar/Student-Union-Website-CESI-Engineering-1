<?php

try {
    // On se connecte à MySQL
    $global_bde = new PDO('mysql:host=global.bde.studisys.net;port=40001;name=global_bde;charset=utf8', 'global_wadm', '892F51a1');
    $global_bde->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    echo '<li class="alert" >$e->getMessage()</li>';
    die('Erreur : '.$e->getMessage());
}
?>


