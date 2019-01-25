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
        $_SESSION['status']="Membre BDE";
        include("../scripts/setConnexionLocalBDD.php"); 
        if(isset($_POST['id'])){
            if(isset($_POST['l_inscrits'])){
                header("Content-Type: text/csv");
                header("Content-Disposition: attachment; filename=file.csv");

                function outputCSV($data) {
                $output = fopen("php://output", "wb");
                foreach ($data as $row)
                    fputcsv($output, $row); // here you can change delimiter/enclosure
                fclose($output);
                }

                outputCSV(array(
                array("name 1", "age 1", "city 1"),
                array("name 2", "age 2", "city 2"),
                array("name 3", "age 3", "city 3")
                ));
            } else if(isset($_POST['delete'])){
                $local_bdd->query('call orleans_bde.spd_evenement_by_id('.$_POST['id'].');');
                $_POST['delete'] = NULL;

            }else if(isset($_POST['edit'])){
    
            }else if(isset($_POST['private'])){
                $query= $local_bdd->query('call orleans_bde.spe_evenement_status('.$_POST['id'].');');
                $query = $local_bdd->query('call orleans_bde.sps_event('.$_POST['id'].');');
                $event = $query->fetch();
                $query->closeCursor();

                if($event['Id_status_accessibilite']==4) {
                    $query = $local_bdd->query('call orleans_bde.sps_user('.$event['Id_utilisateur'].');');
                    $user = $query->fetch();
                    $query->closeCursor();
                    // mail($user['Email'],"Evénement privé","Votre évenement à été mis en privé par un administrateur, 
                    // car son contenu a été jugé offensant ou restrictif.");
                }
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
