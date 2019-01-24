<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>BDE CESI Exia</title>
		<?php $PAGE = "home" ?>
	</head>

	<body>
		<?php include("../common/header.php") ?>
        <?php include("../idea_box/BandeauSubmitIdea.php"); ?>

		<?php
        //$_SESSION['status']="Membre BDE";
        include("../scripts/setConnexionLocalBDD.php"); 
        if(isset($_POST['id'])){
            if(isset($_POST['l_inscrits'])){

            } else if(isset($_POST['delete'])){
                $local_bdd->query('call orleans_bde.spd_evenement_by_id('.$_POST['id'].');');
                $_POST['delete'] = NULL;

            }else if(isset($_POST['edit'])){
    
            }else if(isset($_POST['private'])){
                $query= $local_bdd->query('call orleans_bde.spe_evenement_status('.$_POST['id'].');');
                $_POST['private'] = NULL;

            }else if(isset($_POST['participate'])){
                $query= $local_bdd->query('call orleans_bde.spi_participant_evenement('.$_SESSION['id'].','.$_POST['id'].');');
                $_POST['participate'] = NULL;
            }
            else if(isset($_POST['stop_participate'])){
                $query= $local_bdd->query('call orleans_bde.spd_participant_evenement('.$_SESSION['id'].','.$_POST['id'].');');
                $_POST['stop_participate'] = NULL;
            }
            $_POST['id'] = NULL;

        }
        
        if($_SESSION['status']=="Personnel CESI" || $_SESSION['status']=="Membre BDE") {
            $events = $local_bdd->query('call orleans_bde.spl_evenement_to_come();');
        } else {
            $events = $local_bdd->query('call orleans_bde.spl_evenement_to_come_public();');
        }
        $id_events = array();
        while($datasEvent = $events->fetch()){
            $id_events[] = $datasEvent['Id_evenement'];
        }

        $events->closeCursor();
        
        foreach ($id_events as $id_event){
            include("../events_passed/event.php");
            echo '<hr>';
        }

        ?>

		<?php include("../common/footer.php") ?>
		
	</body>
</html>
