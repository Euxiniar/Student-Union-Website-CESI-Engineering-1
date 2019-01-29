<?php

?>

<div class = "common-box pb-4 mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3"><!--Image-->
                        <img alt="Photo de couverture de l'évènement" src="<?php echo $datasEvent['URL_photo'] ?>" class = "common-arrondi common-couverture">
                    </div><!--Image-->
                    <div class="col-md-9">
                        <h2> <?php echo $datasEvent['Titre'] ?> </h2></br>
                        <span class = "font-weight-bold">Créateur : </span><?php echo $datasUser['Prenom'] . ' ' . $datasUser['Nom'] ?> </br>
                        <i class="fas fa-euro-sign pr-2"></i><?php echo $datasEvent['Cout'] . '€' ?> </br>
                        <i class="far fa-calendar-alt pr-2"></i><?php echo $datasEvent['Date_evenement'] ?> <i class="fas fa-clock"></i><?php echo ' '. $datasEvent['Heure'] ?></br>
                        <i class="fas fa-map-marker-alt pr-2" style="color:blue"></i><?php echo $datasEvent['Lieu'] ?> </br>
                        <?php
                        if (isset($_SESSION['id'])) {
                            if ($_SESSION['status'] == "Membre BDE" || $_SESSION['status'] == "Personnel CESI") {
                                if ($datasStatus['Designation'] == 'Public')
                                    echo '<i class="fas fa-user-secret"></i><span class="font-weight-bold common-green">' . ' '.$datasStatus['Designation'] . '</span></br>';
                                else {
                                    echo '<i class="fas fa-user-secret"></i><span class="font-weight-bold common-red">' . ' '.$datasStatus['Designation'] . '</span></br>';
                                }
                            }
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

            <div class="col-md-3 m-auto "> <!--Boutons-->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="nbrVote">
                                <div class="VoteBox common-max-width-60 common-center-text">
                                    <p class = "Number"><?php echo $datasEvent['Nbr_votes'] ?></p>
                                    <p class = "SmallText">votes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="VoteButton common-center-text common-max-width-60"> <!--Boutton de vote-->
                                <form method="post">

                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        echo '<input type="hidden" name="id" value="' . $datasEvent['Id_evenement'] . '" />';
                                        if ($vote['count'] < 1 && isset($_SESSION['id'])) {
                                            echo '<button class="BigButton mt-1" name = "button-vote" type="submit" >Voter</button>';
                                        } else {
                                            echo '<button class="BigButton mt-1" type="submit" name="button-stop-vote">Retirer son vote</button>';
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                        </div> <!--Bouton vote-->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="BDECESIButtons d-inline-flex common-center-text">
                                <?php
                                if (isset($_SESSION['id'])) {
                                    if ($_SESSION['status'] == "Membre BDE") {
                                        echo '
                                            <form method="post" action="../idea_box/AccueilBoxIdea.php"> <!--Supprimer-->
                                                <input type="hidden" name="id" value="' . $datasEvent['Id_evenement'] . '" />
                                                <button class="btn btn-danger mx-1" type="submit" name="button-suppr" ><i class="fas fa-times"></i></button>
                                            </form>
                                            <form method="post" action="../common/editEvent.php"> <!--edition-->
                                                <input type="hidden" name="id" value="' . $datasEvent['Id_evenement'] . '" />
                                                <button class="btn btn-info mx-1" href="../idea_box/editIdea.php" type="submit" name="button-edit" ><i class="fas fa-cog"></i></button>
                                            </form>';
                                    } else if ($_SESSION['status'] == "Personnel CESI") {
                                        echo '
                                            <form method="post""><!--privé-->
                                                <input type="hidden" name="id" value="' . $datasEvent['Id_evenement'] . '" />
                                                <button class="btn btn-dark mx-1" type="submit" name="button-private" ><i class="fas fa-user-secret"></i></button>
                                            </form>';/*privé*/
                                    }
                                }
                                ?>
                            </div>
                        </div> <!--Boutons administration-->
                    </div>
                    <div class="row">
                        <div class="col-md-12 common-center-text">
                            <?php
                            if (isset($_SESSION['id'])) {
                                if($_SESSION['status']=="Membre BDE") { /*Valider*/
                                    echo
                                        '<form method = "post" action = "../idea_box/AccueilBoxIdea.php" >
                                    <input type = "hidden" name = "id" value = "' . $datasEvent['Id_evenement'] . '" />
                                    <button type = "submit" class="buttonValid" name = "button-valid" >
                                        Valider
                                        <i class="fa fa-check" ></i >
                                    </button >
                                </form >';
                                }
                            }?>

                        </div> <!--Bouton valider-->
                    </div>
                </div>

            </div> <!--Boutons-->
        </div>
    </div>
</div>
