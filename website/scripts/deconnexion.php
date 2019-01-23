<?php

 include("../common/header.php");


if (isset($_SESSION)) {
    session_destroy();
    $_SESSION = null;
}

if (isset($_SESSION)) {
    echo '<h1>Vous êtes connectés</h1>';
}
else {
    echo '<h1>vous avez été déconnecté</h1>';
}

echo '<p><a href ="../disconnected/home.php">retour à l\'acceuil</a></p>';

include("../common/footer.php");
?>
