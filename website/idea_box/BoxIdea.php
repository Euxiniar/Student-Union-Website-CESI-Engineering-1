<?php
if (isset($_SESSION['id'])) {
    $event = $local_bdd->query('call orleans_bde.sps_evenement('.$id_event.');');
    $datasEvent = $event->fetch();
    $event->closeCursor();

    $user = $local_bdd->query('call orleans_bde.sps_user('.$datasEvent['Id_utilisateur'].');');
    $datasUser = $user->fetch();
    $user->closeCursor();

    $has_vote = $local_bdd->query('call orleans_bde.spt_utilisateur_has_vote('.$_SESSION['id'].','.$id_event.');');
    $vote = $has_vote->fetch();
    $has_vote->closeCursor();
    ?>

    <div class = "IdeaBox pb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3"><!--Image-->
                            <img alt="Photo de couverture de l'évènement" src="<?php echo $datasEvent['URL_photo'] ?>" class = "common-arrondi common-couverture">
                        </div><!--Image-->
                        <div class="col-md-9">
                            <t2> <?php echo $datasEvent['Titre'] ?> </t2></br>
                            <span class = "font-weight-bold">Créateur : </span><?php echo $datasUser['Prenom'] . ' ' . $datasUser['Nom'] ?> </br>
                            <span class = "font-weight-bold">Cout de participation : </span><?php echo $datasEvent['Cout'] . '€' ?> </br>
                            <span class = "font-weight-bold">Date de l'évènement : </span><?php echo $datasEvent['Date_evenement'] ?> </br>
                            <span class = "font-weight-bold">Lieu de l'évènement : </span><?php echo $datasEvent['Lieu'] ?> </br>
                            <?php
                            $status = $local_bdd->query('call orleans_bde.sps_statusaccessibilite('.$datasEvent['Id_status_accessibilite'].');');
                            $datasStatus = $status->fetch();
                            $status->closeCursor();

                            if($_SESSION['status']=="Membre BDE" || $_SESSION['status']=="Personnel CESI") {
                                echo '<span class="font-weight-bold">Etat : </span><span>' . $datasStatus['Designation'] . '</span></br>';
                            }
                            ?>
                        </div> <!--Titre et données-->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class = "font-weight-bold">Description</p>
                            <?php echo $datasEvent['Description'] ?>
                        </div><!--Description-->
                    </div>
                </div>
                <div class="col-md-3 m-auto">
                    <div class="ButtonsGridIdea">
                        <div class="nbrVote">
                            <div class="VoteBox">
                                <p class = "Number"><?php echo $datasEvent['Nbr_votes'] ?></p>
                                <p class = "SmallText">votes</p>
                            </div>
                        </div>
                        <div class="VoteButton "> <!--Boutton de vote-->
                            <button type="button" class="BigButton" href = "home.php">
                                Vote
                            </button>
                        </div>
                        <div class="BDECESIButtons d-inline-flex">
                            <?php if($_SESSION['status']=="Membre BDE")
                                echo '
                                <form method="post" action="../idea_box/AccueilBoxIdea.php"> <!--Supprimer-->
                                    <input type="hidden" name="id" value="'.$datasEvent['Id_evenement'] .'" />
                                    <button class="btn btn-primary" type="submit" name="button-suppr" ><i class="fas fa-times"></i></button>
                                </form>
                            <form method="post" action="../common/editEvent.php"> <!--edition-->
                                <input type="hidden" name="id" value="'.$datasEvent['Id_evenement'].'" />
                                <button class="btn btn-primary" href="../idea_box/editIdea.php" type="submit" name="button-edit" ><i class="fas fa-cog"></i></button>
                            </form>';
                            else if ($_SESSION['status']=="Personnel CESI"){
                            echo '
                            <form method="post" action ="../idea_box/editIdea.php"><!--privé-->
                                <input type="hidden" name="id" value="'.$datasEvent['Id_evenement'].'" />
                                <button class="btn btn-primary" type="submit" name="button-private" ><i class="fas fa-user-secret"></i></button>
                            </form>';/*privé*/
                            }
                            ?>
                        </div>
                        <?php if($_SESSION['status']=="Membre BDE") { /*Valider*/
                            echo
                            '<form method = "post" action = "../idea_box/AccueilBoxIdea.php" >
                            <input type = "hidden" name = "id" value = "'.$datasEvent['Id_evenement'].'" />
                            <button type = "submit" class="buttonValid" name = "button-valid" >
                                Valider
                                <i class="fa fa-check" ></i >
                            </button >
                        </form >';
                        }
                        ?>
                    </div>
                </div> <!--Boutons-->
            </div>
        </div>
    </div>
<?php
}
?>