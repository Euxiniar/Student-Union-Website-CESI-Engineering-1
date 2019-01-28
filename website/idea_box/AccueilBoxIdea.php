<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/idea.css" />
</head>

    <body class="body common-background-white">
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

        $event = $local_bdd->query('call orleans_bde.spl_evenements_idea();');
        $id_events = array();

        while($datasEvent = $event->fetch()){
            if ($datasEvent['Id_status_accessibilite']  != 1) { /* != Public*/
                if (isset ($_SESSION['id'])){
                    if ($_SESSION['status'] == 'Membre BDE' || $_SESSION['status'] == 'Personnel CESI') {
                        $id_events[] = $datasEvent['Id_evenement'];
                    }
                }
            }
            else {
                $id_events[] = $datasEvent['Id_evenement'];
            }
        }
        $event->closeCursor();


        //if no idea, then we include the page no idea
        if (empty($id_events)) {
            include("../idea_box/noIdeas.php");
        }


        /*Create ideas and get datas*/
        foreach($id_events as $id_event) {
            $event = $local_bdd->query('call orleans_bde.sps_evenement('.$id_event.');');
            $datasEvent = $event->fetch();
            $event->closeCursor();

            $user = $local_bdd->query('call orleans_bde.sps_user('.$datasEvent['Id_utilisateur'].');');
            $datasUser = $user->fetch();
            $user->closeCursor();

            if (isset($_SESSION['id'])) {
                $has_vote = $local_bdd->query('call orleans_bde.spt_utilisateur_has_vote(' . $_SESSION['id'] . ',' . $id_event . ');');
                $vote = $has_vote->fetch();
                $has_vote->closeCursor();
            }

            $status = $local_bdd->query('call orleans_bde.sps_statusaccessibilite('.$datasEvent['Id_status_accessibilite'].');');
            $datasStatus = $status->fetch();
            $status->closeCursor();


            include("../idea_box/BoxIdea.php");
            echo '<hr class = "common-separator1">';



        }

        /*---------------------------------------*/

        ?>
        <?php include("../common/footer.php"); ?>

    </body>

</html>

