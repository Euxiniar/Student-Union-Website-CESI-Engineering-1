<html>
    <head>
    </head>

    <body class="body">
        <?php $PAGE = 'AccueilBoxIdea'; ?>
        <?php include("../common/header.php"); ?>
        <?php if (isset($_SESSION['id'])){
            include("../idea_box/BandeauSubmitIdea.php");
        }
        ?>

        <?php
        include("../scripts/setConnexionLocalBDD.php");


        /*Actions selon le bouton enclenché*/
        if (isset($_SESSION['id'])){
            if (isset($_POST['id'])) {
                if (isset($_POST['button-suppr'])) {
                    $local_bdd->query('call orleans_bde.spd_evenement_by_id(' . $_POST['id'] . ');');
    /*                echo '<meta http-equiv="refresh" content="0">';*/
                }
                if (isset($_POST['button-valid'])){
                    $local_bdd->query('call orleans_bde.spe_evenement_idea_to_tocome(' . $_POST['id'] . ');');
                    /*                echo '<meta http-equiv="refresh" content="0">';*/
                }
                if (isset($_POST['button-vote'])){
                    $has_vote = $local_bdd->query('call orleans_bde.spt_utilisateur_has_vote('.$_SESSION['id'].','.$_POST['id'].');');
                    $vote = $has_vote->fetch();
                    $has_vote->closeCursor();
                    if($vote['count']<1) {
                        $local_bdd->query('call orleans_bde.spe_nbr_votes_increment(' . $_POST['id'] . ');');
                        $local_bdd->query('call orleans_bde.spi_voteidea(' . $_SESSION['id'] . ', ' . $_POST['id'] . ');');
                    }
                }
                if (isset($_POST['button-stop-vote'])){
                    $has_vote = $local_bdd->query('call orleans_bde.spt_utilisateur_has_vote('.$_SESSION['id'].','.$_POST['id'].');');
                    $vote = $has_vote->fetch();
                    $has_vote->closeCursor();
                    if($vote['count']>0) {
                        $local_bdd->query('call orleans_bde.spe_nbr_votes_decrement(' . $_POST['id'] . ');');
                        $local_bdd->query('call orleans_bde.spd_voteidea(' . $_SESSION['id'] . ', ' . $_POST['id'] . ');');
                    }
                }
                if (isset($_POST['button-private'])){
                    $local_bdd->query('call orleans_bde.spe_evenement_status(' . $_POST['id'] . ');');
                }
                $_POST['id'] =null;
                $_POST['button-suppr'] =null;
            }
        }
        /*---------------------------------------*/


        /*Selection des idées à afficher*/
        $nbrIdeas = $local_bdd->query('call orleans_bde.spl_evenements_idea();');
        $nbrOfIdeas = $nbrIdeas->fetch();
        $nbrIdeas->closeCursor();

        if ($nbrOfIdeas >= 1) {
            $event = $local_bdd->query('call orleans_bde.spl_evenements_idea();');
            $id_events = array();

            while($datasEvent = $event->fetch()){
                $id_events[] = $datasEvent['Id_evenement'];
            }
            $event->closeCursor();

            foreach($id_events as $id_event) {
                include("../idea_box/BoxIdea.php");
                echo '<hr class = "common-separator1">';
            }
        }
        else {
            include("../idea_box/noIdeas.php");
        }
        /*---------------------------------------*/

        ?>
        <?php include("../common/footer.php"); ?>

    </body>

</html>

