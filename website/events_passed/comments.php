
<html>
<head>
</head>

<body class="body common-background-gray">
<?php

$_POST['id_photo'] = 2; /*To change !!!!*/
$idPhoto = $_POST['id_photo'];


$PAGE = 'AccueilBoxIdea'; ?>
<?php include("../common/header.php"); ?>

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
    if (isset($_POST['button-submit-comment']) && $_POST['id_photo']){

        $query =
            'call orleans_bde.spi_commentaire(
    \'' . htmlspecialchars($_POST['commentToInsert']) . '\',  
    \'' . date("Y-m-d") . '\',  
    \'' . date("H:i:s") . '\',  
    ' . 1 . ',
    ' . $_SESSION['id'] . ',  
    ' . $idPhoto . ');';

/*        echo $query;*/

        $local_bdd->query($query);
    }
}
/*---------------------------------------*/

include("../scripts/setConnexionLocalBDD.php");

/*Selection des idées à afficher*/
$nbrcomments = $local_bdd->query('call orleans_bde.spl_commentaires_by_photo('. $idPhoto.' );');
$allComments = $nbrcomments->fetch();
$nbrcomments->closeCursor();


$id_events = array();
$comments = $local_bdd->query('call orleans_bde.spl_commentaires_by_photo('. $idPhoto.' );');
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


