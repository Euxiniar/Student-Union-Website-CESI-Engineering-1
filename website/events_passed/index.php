<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>		
		<title>BDE CESI Exia</title>
		<?php $PAGE = "home" ?>
	</head>

	<body>
		<?php include("../common/header.php") ?>
        <?php include("../idea_box/BandeauSubmitIdea.php"); ?>

		<?php
        include("../scripts/setConnexionLocalBDD.php"); 
        $events = $local_bdd->query('call orleans_bde.spl_evenement_passed();');
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
