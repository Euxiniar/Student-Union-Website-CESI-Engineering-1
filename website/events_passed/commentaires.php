
<html>
<head>
</head>

<body class="body common-background-gray">
<?php $PAGE = 'AccueilBoxIdea'; ?>
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
}
/*---------------------------------------*/

include("../scripts/setConnexionLocalBDD.php");
/*$events = $local_bdd->query('call orleans_bde.spl_evenement_passed();');
$datasEvent = $events->fetch();
$events->closeCursor();
$query = 'call orleans_bde.sps_user('.$datasEvent['Id_utilisateur'].');';
$user = $local_bdd->query($query);
$datasUser = $user->fetch();
$user->closeCursor();*/

$_POST['id_evenement'] = 18; /*To change !!!!*/


/*Selection des idées à afficher*/
$nbrcomments = $local_bdd->query('call orleans_bde.spl_commentaires_by_evenement('. $_POST['id_evenement'].' );');
$allComments = $nbrcomments->fetch();
$nbrcomments->closeCursor();

if ($allComments >= 1) {
    $id_events = array();
    $comments = $local_bdd->query('call orleans_bde.spl_commentaires_by_evenement('. $_POST['id_evenement'].' );');
    while($datasComments = $comments->fetch()){
        $id_commentaires[] = $datasComments['Id_commentaire'];
    }
    $comments->closeCursor();

    echo '<hr class = "common-separator1">';

    foreach($id_commentaires as $id_commentaire) {
        include("../events_passed/commentaire.php");
        echo '<hr class = "common-separator3">';
    }

    echo '<hr class = "common-separator1">';
}

else {
    include("../idea_box/noEvents.php");
}
/*---------------------------------------*/

?>
<?php include("../common/footer.php"); ?>

</body>

</html>


