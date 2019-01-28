<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     

      <title>BDE CESI Exia</title>
      <?php $PAGE = "home" ?>
    </head>
    <body class="common-background-gray">
      <?php 
          include("../scripts/setConnexionLocalBDD.php"); 
          $events = $local_bdd->query('call orleans_bde.sps_event('.$id_event.');');
          $datasEvent = $events->fetch();
          $events->closeCursor();
          $status = $local_bdd->query('call orleans_bde.sps_statusaccessibilite('.$datasEvent['Id_status_accessibilite'].');');
          $datasStatus = $status->fetch();
          $status->closeCursor();
          if(isset($_SESSION['status'])){
            $participate_event = $local_bdd->query('call orleans_bde.spt_participant_evenement('.$_SESSION['id'].','.$id_event.');');
            $participate = $participate_event->fetch();
            $participate_event->closeCursor();
          }
      ?>

      <div class="container common-box">
        <div class="row mt-2">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2 order-md-0 order-1">
                <img class="img-fluid d-block d-inline-flex pt-2 pr-2" src="<?php echo $datasEvent['URL_photo'];?>" style="width:150px;max-width:100%;max-height:320px;">
              </div>
              <div class="col-md-6 order-md-1 order-2">
                <h1 class="display-5 mb-0"><?php echo $datasEvent['Titre'];?></h1>
                <p class="text-justify d-inline-block mb-0">
                  <p class="text-justify d-inline-block mb-0"><?php echo $datasEvent['Heure'];?></p>
                  <p class="text-justify d-inline-block mb-0 ml-1 mr-1">-</p>
                  <p class="text-justify d-inline-block mb-0"> <?php echo $datasEvent['Date_evenement'];?></p>
                </p>
                <p class="text-justify d-inline-block mb-0">
                  <i class="fas fa-map-marker-alt pr-1" style="color:blue"></i>
                  <?php echo $datasEvent['Lieu'];?>
                </p>
                <p class="text-justify"><?php echo $datasEvent['Nbr_participants'].' Participants'; ?></p>
                <!-- TODO Afficher cette partie si membre du BDE -->
                <div class="col-md-12 d-inline-flex p-0 m-0">
                <?php
                  if(isset($_SESSION['status']) AND ($_SESSION['status']=="Membre BDE" || $_SESSION['status']=="Personnel CESI")) {
                    echo '<p class="text-justify pr-1">Etat :</p>
                    <p class="text-justify mr-2 m-0 p-0">'.
                      $datasStatus['Designation'].
                    '</p>';
                  }
                ?>
                  
                </div>
              </div>
              <div class="col-md-4 order-md-2 order-0">
                
                  <div class="col-md-6 col-12 order-0 order-md-1 text-center d-inline-block"> 
                    <?php
                      if(isset($_SESSION['status']) AND $_SESSION['status']=="Membre BDE"){
                        echo '
                        <form method="post">
                          <input type="hidden" name="id" value="'.$datasEvent['Id_evenement'].'"/>
                          <button class="btn btn-primary" type="submit" name="l_inscrits">Télécharger la liste des inscrits (CSV)</button>
                          <button class="btn btn-primary" type="submit" name="delete"><i class="fas fa-times"></i></button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="id" value="'.$datasEvent['Id_evenement'].'"/>
                            <button class="btn btn-primary" type="submit" name="l_inscrits_pdf">Télécharger la liste des inscrits (PDF)</button>
                        </form>';
                          
                        if($datasEvent['Id_status_date']==1){
                          echo '
                          <form method="post" action="../common/editEvent.php">
                            <input type="hidden" name="id" value="'.$datasEvent['Id_evenement'].'"/>
                            <button class="btn btn-primary" type="submit" name="edit"><i class="fas fa-cog"></i></button>
                          </form>';
                        }
                      }
                    ?>
                    <?php
                      if(isset($_SESSION['status']) AND ($_SESSION['status']=="Personnel CESI")){
                        echo '
                        <form method="post">
                          <input type="hidden" name="id" value="'.$datasEvent['Id_evenement'].'"/>
                          <button class="btn btn-primary" type="submit" name="private"><i class="fas fa-user-secret"></i></button>
                        </form>';
                      }
                    ?>
                  </div>
                
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mt-2">
                <p class="font-weight-bold mb-0">Description :</p>
                <p class="text-justify pr-3 pl-3"><?php echo $datasEvent['Description'];?>
              </div>
              <?php
                if($datasEvent['Id_status_date']==1){
                  echo '
                    <div class="col-md-12 d-inline-flex">
                    <form method="post">
                      <input type="hidden" name="id" value="'.$datasEvent['Id_evenement'].'"/>';
                      if($participate['count']<1){
                        echo '<button class="btn btn-primary align-items-center d-flex mr-1" type="submit" name="participate">Participer</button>';
                      }else{
                        echo '<button class="btn btn-primary align-items-center d-flex mr-1" type="submit" name="stop_participate">Se désinscrire</button>';
                      }
                    echo '</form>
                      <div class="mb-3">
                        <h5 class="text-justify d-inline-flex m-0" font size="10">Coût de participation :</h5>
                        <h5 class="text-justify d-inline-flex m-0">'.$datasEvent['Cout'].'</h5>
                        <h5 class="text-justify d-inline-flex m-0">€</h5>
                        <h6 class="text-justify m-0">(à régler avec votre BDE au maximum la veille)</h6>
                      </div>
                    </div>';
                }else if($datasEvent['Id_status_date']==2){
                  echo '<div>
                  <form method="post" action="../events_passed/index_photos.php">
                    <input type="hidden" name="id_event" value="'.$datasEvent['Id_evenement'].'"/>
                    <button class="btn btn-primary mb-3 ml-3" type="submit" name="Photos">Voir les photos</button>
                  </form>
                  </div>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>