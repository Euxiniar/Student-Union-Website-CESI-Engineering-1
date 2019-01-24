<html>
    <head>
    </head>

    <body class="body">
        <?php $PAGE = 'AccueilBoxIdea'; ?>
        <?php include("../common/header.php"); ?>
        <?php include("../idea_box/BandeauSubmitIdea.php"); ?>

        <?php
        include("../scripts/setConnexionLocalBDD.php");

        if (isset($_POST['id'])) {
            if (isset($_POST['button-suppr'])) {
                $local_bdd->query('call orleans_bde.spd_evenement_by_id(' . $_POST['id'] . ');');
/*                echo '<meta http-equiv="refresh" content="0">';*/
            }
            $_POST['id'] =null;
            $_POST['button-suppr'] =null;
        }

        $user = $local_bdd->query('call orleans_bde.spl_evenements_idea();');
        $id_events = array();


        while($datasEvent = $user->fetch()){
/*            include("../idea_box/BoxIdea.php");
            echo '<hr class = "separator">';*/
            $id_events[] = $datasEvent['Id_evenement'];
        }
        $user->closeCursor();

        foreach($id_events as $id_event) {
            include("../idea_box/BoxIdea.php");
            echo '<hr class = "separator">';
        }

        ?>
        <?php include("../common/footer.php"); ?>

    </body>

</html>

