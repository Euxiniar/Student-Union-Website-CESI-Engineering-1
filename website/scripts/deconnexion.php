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
    echo '
    <div class="container-fluid ">
    <div class="row common-center-div ">
        <div class="col-md-12 common-center-text ">
            <span class="common-t2 pb-5">Vous avez été déconnecté</span>
        </div>
    </div>
</div>';
    echo '<meta http-equiv="refresh" content="1; URL=../connected/home.php">';
}

echo '<p><a href ="../connected/home.php">retour à l\'acceuil</a></p>';

include("../common/footer.php");
?>
