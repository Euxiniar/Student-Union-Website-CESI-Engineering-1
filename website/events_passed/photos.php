<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Photos</title>
		<?php $PAGE = "home" ?>
	</head>

	<body>
    <?php 
          include("../scripts/setConnexionLocalBDD.php"); 
          $photo = $local_bdd->query('call orleans_bde.sps_photo('.$id_photo.');');
          $datasPhoto = $photo->fetch();
          $photo->closeCursor();
          $user = $local_bdd->query('call orleans_bde.sps_user('.$datasPhoto['Id_utilisateur'].');');
          $datasUser = $user->fetch();
          $user->closeCursor();
          $status = $local_bdd->query('call orleans_bde.sps_statusaccessibilite('.$datasPhoto['Status'].');');
          $datasStatus = $status->fetch();
          $status->closeCursor();
          if(isset($_SESSION['id'])) {
            $like_photo = $local_bdd->query('call orleans_bde.spt_likephoto('.$_SESSION['id'].','.$id_photo.');');
            $like = $like_photo->fetch();
            $like_photo->closeCursor();
          }
    ?>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 d-block">
                <img class="" src="<?php echo $datasPhoto['URL_photo'];?>" style="width:150px;max-width:100%;max-height:320px;">
                <div>
                    <p class="font-weight-bold mb-0 d-inline-flex"><?php echo $datasUser['Prenom']; ?></p>
                    <p class="font-weight-bold mb-0 d-inline-flex"><?php echo $datasUser['Nom']; ?></p>
                </div>
                <div>
                    <p class="font-weight-bold mb-0 d-inline-flex"><?php echo $datasPhoto['Date']; ?></p>
                    <p class="font-weight-bold mb-0 d-inline-flex"><?php echo $datasPhoto['Heure']; ?></p>
                </div>

                
                <?php
                    echo '
                    <form method="post" action="../events_passed/comments.php">
                        <input type="hidden" name="id_photo" value="'.$datasPhoto['Id_photo'].'"/>
                        <button class="btn btn-primary" type="submit" name="like">Commenter</button>
                    </form>';
                ?>
            </div>
            <div class="col-md-4 d-block">
                <?php
                if(isset($_SESSION['status'])) {
                    if($_SESSION['status']=="Personnel CESI"){
                        echo '
                        <form method="post">
                          <input type="hidden" name="id" value="'.$datasPhoto['Id_photo'].'"/>
                          <button class="btn btn-primary" type="submit" name="private"><i class="fas fa-user-secret"></i></button>
                        </form>';
                    }
                    if($_SESSION['status']=="Membre BDE"){
                        echo '
                        <form method="post">
                          <input type="hidden" name="id" value="'.$datasPhoto['Id_photo'].'"/>
                          <button class="btn btn-primary" type="submit" name="delete"><i class="fas fa-times"></i></button>
                        </form>';
                    }
                    if($_SESSION['status']=="Membre BDE" || $_SESSION['status']=="Personnel CESI") {
                    echo '<p class="d-inline-flex">Etat :</p>
                    <p class="d-inline-flex">'.
                        $datasStatus['Designation'].
                    '</p>';
                    }
                }
                ?>
                <p class="font-weight-bold mb-0">
                    <?php 
                    if(isset($_SESSION['id'])) {
                        echo $datasPhoto['Nbr_like']; ?>
                </p>
                <?php
                    echo '<form method="post">
                    <input type="hidden" name="id" value="'.$datasPhoto['Id_photo'].'"/>';
                    
                        if($like['count']<1){
                        echo '<button class="btn btn-primary" type="submit" name="like">Aimer</button>';
                        }else{
                        echo '<button class="btn btn-primary" type="submit" name="stop_like">Ne plus aimer</button>';
                        }
                    echo '</form>';
                }
                ?>
            </div>
        </div>
    </div>
    </body>
</html>