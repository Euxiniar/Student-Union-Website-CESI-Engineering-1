
<?php
$idEvenement = 18;
include("../scripts/setConnexionLocalBDD.php");
$comments = $local_bdd->query('call orleans_bde.sps_commentaire('. $id_commentaire . ');');
$datasCommentaire = $comments->fetch();
$comments->closeCursor();

$user = $local_bdd->query('call orleans_bde.sps_user('.$datasCommentaire['Id_utilisateur'].');');
$datasUser = $user->fetch();
$user->closeCursor();

$status = $local_bdd->query('call orleans_bde.sps_statusaccessibilite('.$datasCommentaire['Id_status'].');');
$datasStatus = $status->fetch();
$status->closeCursor();

$statusUser = $local_bdd->query('call orleans_bde.sps_status('.$datasUser['Id_Status'].');');
$datasStatusUser = $statusUser->fetch();
$statusUser->closeCursor();
?>

<div class="container-fluid common-background-blue common-arrondi common-size-50 ">
    <div class="row"><!--nom prénom date heure -->
        <div class="col-md-12">
            <?php
            echo '<p class="text-justify">'. $datasUser['Prenom'] . ' ' .$datasUser['Nom'] . '<span class="font-italic"> à ' . $datasCommentaire['Heure'] . ' le '.$datasCommentaire['Date'] . '.</span>  ';
                if ($_SESSION['status'] == 'Membre BDE' || $_SESSION['status'] == "Personnel CESI"){
                    if ($datasStatus['Designation'] == 'Public')
                        echo '<span class="font-weight-bold common-green">' . $datasStatus['Designation'] . '</span>';
                    else {
                        echo '<span class="font-weight-bold common-red">' . $datasStatus['Designation'] . '</span>';
                    }
                }
                else
                    echo '<span class="common-left-text ml-5"> '.$datasStatusUser['Designation'] .'</span></p>';
                ?>
            <hr class="common-separator2"/>
        </div>
    </div>
    <div class="row"> <!--Texte -->
        <div class="col-md-12">
            <p class="text-justify pr-3 pl-3"><?php echo $datasCommentaire['Texte'];?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="BDECESIButtons d-inline-flex">

                <?php
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['status'] == "Membre BDE"){
                        echo '
                            <form method="post"> <!--Supprimer-->
                                <input type="hidden" name="id" value="' . $datasCommentaire['Id_commentaire'] . '" />
                                <button class="btn btn-primary" type="submit" name="button-suppr" ><i class="fas fa-times"></i></button>
                            </form>';
                    }
                    else if ($_SESSION['status']=="Personnel CESI"){
                        echo '
                        <form method="post"><!--privé-->
                            <input type="hidden" name="id" value="'.$datasCommentaire['Id_commentaire'].'" />
                            <button class="btn btn-primary" type="submit" name="button-private" ><i class="fas fa-user-secret"></i></button>
                        </form>';/*privé*/
                    }
                }

                    ?>
            </div>
        </div>
    </div> <!--Boutons -->

</div>



