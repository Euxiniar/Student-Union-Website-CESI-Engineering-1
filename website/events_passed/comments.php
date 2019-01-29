
<html>
<head>
</head>

<body class="body common-background-gray">
<?php

$PAGE = 'Commentaires'; ?>

<?php include("../common/header.php");
if(!isset($_SESSION)){
    session_start();
}
if (isset($_POST['id_photo'])){
    $_SESSION['id_photo'] = $_POST['id_photo'];
}
?>

<?php
include("../scripts/setConnexionLocalBDD.php");


/*Actions selon le bouton enclenché*/
if (isset($_SESSION['id'])){
    if (isset($_POST['id'])) {
        if (isset($_POST['button-suppr'])) {
            $local_bdd->query('call orleans_bde.spd_commentaire_by_id(' . $_POST['id'] . ');');
        }
        if (isset($_POST['button-private'])) {
            $local_bdd->query('call orleans_bde.spe_commentaire_status(' . $_POST['id'] . ');');
        }
        $_POST['id'] =null;
        $_POST['button-suppr'] =null;
    }
    if (isset($_POST['button-submit-comment']) && $_SESSION['id_photo'] ){

        $query =
            'call orleans_bde.spi_commentaire(
    \'' . htmlspecialchars($_POST['commentToInsert']) . '\',  
    \'' . date("Y-m-d") . '\',  
    \'' . date("H:i:s") . '\',  
    ' . 1 . ',
    ' . $_SESSION['id'] . ',  
    ' . $_SESSION['id_photo'] . ');';

/*        echo $query;*/

        $local_bdd->query($query);
    }
}
/*---------------------------------------*/

include("../scripts/setConnexionLocalBDD.php");

/*Selection des idées à afficher*/
$nbrcomments = $local_bdd->query('call orleans_bde.spl_commentaires_by_photo('. $_SESSION['id_photo'].' );');
$allComments = $nbrcomments->fetch();
$nbrcomments->closeCursor();




$photo = $local_bdd->query('call orleans_bde.sps_photo('.$_SESSION['id_photo'].');');
$datasPhoto = $photo->fetch();
$photo->closeCursor();
$user = $local_bdd->query('call orleans_bde.sps_user('.$datasPhoto['Id_utilisateur'].');');
$datasUser = $user->fetch();
$user->closeCursor();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 common-center-text mt-5 mb-1">
            <img class="common-arrondi common-photo-event" src="<?php echo $datasPhoto['URL_photo'];?>" style="width:150px;max-width:100%;max-height:320px;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 common-center-text">
            <span >publiée par <?php echo $datasUser['Prenom'] . ' '. $datasUser['Nom'] . '<span class="font-italic"> le '. $datasPhoto['Date'] . ' à ' . $datasPhoto['Heure'] .'</span>'?> </span>
        </div>
    </div>
</div>


<?php
$id_events = array();
$comments = $local_bdd->query('call orleans_bde.spl_commentaires_by_photo('. $_SESSION['id_photo'].' );');
while($datasComments = $comments->fetch()){
    $id_commentaires[] = $datasComments['Id_commentaire'];
}
$comments->closeCursor();
echo '<hr class = "common-separator1">';

include("../events_passed/writeComment.php");

if ($allComments >= 1) {
    foreach($id_commentaires as $id_commentaire) {
        include("../events_passed/comment.php");
        echo '<hr class = "common-separator3">';
    }
    echo '<hr class = "common-separator1">';
}


/*---------------------------------------*/

?>
<?php include("../common/footer.php"); ?>

</body>

</html>


