<?php
if(!isset($_SESSION))
    session_start();
include("../scripts/setConnexionLocalBDD.php"); 
if(isset($_POST['id'])){
    if(isset($_POST['delete'])){
        $local_bdd->query('call orleans_bde.spd_commentaire_by_id_photo('.$_POST['id'].');');
        $local_bdd->query('call orleans_bde.spd_likephoto_by_id_photo('.$_POST['id'].');');
        $local_bdd->query('call orleans_bde.spd_photo_by_id('.$_POST['id'].');');
        $_POST['delete'] = NULL;
    } else if(isset($_POST['private'])){
        $query= $local_bdd->query('call orleans_bde.spe_photo_status('.$_POST['id'].');');
        $query = $local_bdd->query('call orleans_bde.sps_photo('.$_POST['id'].');');
        $photo = $query->fetch();
        $query->closeCursor();

        if($photo['Id_status_accessibilite']==4) {
            $query = $local_bdd->query('call orleans_bde.sps_user('.$photo['Id_utilisateur'].');');
            $user = $query->fetch();
            $query->closeCursor();
            // mail($user['Email'],"Evénement privé","Votre photo à été mis en privé par un administrateur, 
            // car son contenu a été jugé offensant ou restrictif.");
        }
        $_POST['private'] = NULL;
    }else if(isset($_POST['like'])){
        $local_bdd->query('call orleans_bde.spi_likephoto('.$_SESSION['id'].','.$_POST['id'].');');
        $local_bdd->query('call orleans_bde.spe_nbr_likephoto_increment('.$_POST['id'].');');
        $_POST['participate'] = NULL;
    }
    else if(isset($_POST['stop_like'])){
        $local_bdd->query('call orleans_bde.spd_likephoto('.$_SESSION['id'].','.$_POST['id'].');');
        $local_bdd->query('call orleans_bde.spe_nbr_likephoto_decrement('.$_POST['id'].');');
        $_POST['stop_participate'] = NULL;
    }
    $_POST['id'] = NULL;
}
?>
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

        if($_SESSION['status']=="Personnel CESI" || $_SESSION['status']=="Membre BDE") {
            $photos = $local_bdd->query('call orleans_bde.spl_photo_by_evenement(18);');
        } else {
            $photos = $local_bdd->query('call orleans_bde.spl_photo_by_evenement_public(18);');
        }
        $id_photos = array();
        while($datasPhoto = $photos->fetch()){
            $id_photos[] = $datasPhoto['Id_photo'];
        }

        $photos->closeCursor();
        
        foreach ($id_photos as $id_photo){
            include("../events_passed/photos.php");
            echo '<hr>';
        }

        ?>

		<?php include("../common/footer.php") ?>
		
	</body>
</html>
