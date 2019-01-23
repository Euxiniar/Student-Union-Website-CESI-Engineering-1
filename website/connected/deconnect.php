<?php

session_start();
if (isset($_SESSION)) {
    session_destroy();
    $_SESSION = null;
}
echo $_SESSION;

if (isset($_SESSION)) {
    echo '<p>Vous êtes connectés</p>';
}
else {
    echo '<p>vous avez été déconnecté</p>';
}

echo '<p></p><a href ="index.php">retour à l\'acceuil</a></p>';

?>