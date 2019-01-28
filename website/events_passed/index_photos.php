<?php
if(!isset($_SESSION))
    session_start();
if(isset($_POST['id_event']))
    $_SESSION['id_event']=$_POST['id_event'];
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
		<?php $PAGE = "Photos" ?>
	</head>

	<body>
		<?php include("../common/header.php") ?>
        <?php 
        if(isset($_SESSION['id'])) {
            $query= $local_bdd->query('call orleans_bde.spt_participant_evenement('.$_SESSION['id'].','.$_SESSION['id_event'].');');
            $participate_event = $query->fetch();
            $query->closeCursor();
            
            include("../events_passed/BandeauAddPhoto.php");
        }
        ?>

        <?php        
        //$_SESSION['status']="Membre BDE";

        if(isset($_SESSION['status']) AND ($_SESSION['status']=="Personnel CESI" || $_SESSION['status']=="Membre BDE")) {
            $photos = $local_bdd->query('call orleans_bde.spl_photo_by_evenement('.$_SESSION['id_event'].');');
        } else {
            $photos = $local_bdd->query('call orleans_bde.spl_photo_by_evenement_public('.$_SESSION['id_event'].');');
        }
        $id_photos = array();
        while($datasPhoto = $photos->fetch()){
            $id_photos[] = $datasPhoto['Id_photo'];
        }

        $photos->closeCursor();

        if (count($id_photos) < 1){
            include("../events_passed/noPhotos.php");
        }
        
        foreach ($id_photos as $id_photo){
            include("../events_passed/photos.php");
            echo '<hr class="common-separator2">';
        }

        ?>
		<?php include("../common/footer.php") ?>
		
	</body>
</html>
