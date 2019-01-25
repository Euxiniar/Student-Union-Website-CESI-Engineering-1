<html>
    <head>
    </head>

    <body class="body">
        <?php $PAGE = 'AccueilBoxIdea'; ?>
        <?php include("../common/header.php"); ?>
        <?php include("../idea_box/BandeauSubmitIdea.php"); ?>

        <?php
        include("../scripts/setConnexionLocalBDD.php");


        /*Actions selon le bouton enclenché*/
        if (isset($_POST['id'])) {
            if (isset($_POST['button-suppr'])) {
                $local_bdd->query('call orleans_bde.spd_evenement_by_id(' . $_POST['id'] . ');');
/*                echo '<meta http-equiv="refresh" content="0">';*/
            }
            if (isset($_POST['button-valid'])){
                $local_bdd->query('call orleans_bde.spe_evenement_idea_to_tocome(' . $_POST['id'] . ');');
                /*                echo '<meta http-equiv="refresh" content="0">';*/
            }
            $_POST['id'] =null;
            $_POST['button-suppr'] =null;
        }
        /*---------------------------------------*/


        /*Selection des idées à afficher*/
        $nbrIdeas = $local_bdd->query('call orleans_bde.spl_evenements_idea();');
        $nbrOfIdeas = $nbrIdeas->fetch();
        $nbrIdeas->closeCursor();

        if ($nbrOfIdeas >= 1) {
            $user = $local_bdd->query('call orleans_bde.spl_evenements_idea();');
            $id_events = array();

            while($datasEvent = $user->fetch()){
                $id_events[] = $datasEvent['Id_evenement'];
            }
            $user->closeCursor();

            foreach($id_events as $id_event) {
                include("../idea_box/BoxIdea.php");
                echo '<hr class = "separator">';
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

