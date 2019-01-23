<html>
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
        <?php 
            include("../scripts/setConnexionLocalBDD.php"); 
            $query = 'call orleans_bde.sps_event_passed('.$id_event.');';
            $events = $local_bdd->query($query);
            $datasEvent = $events->fetch();
            $events->closeCursor();
            $query = 'call orleans_bde.sps_user('.$datasEvent['Id_utilisateur'].');';
            $user = $local_bdd->query($query);
            $datasUser = $user->fetch();
            $user->closeCursor();
        ?>
      <div class="py-5" style="">
      <div class="container">
        <div class="row">
          <div class="col-md-6 p-0 mb-0 col-12 order-1 order-md-0" style=""><img class="img-fluid d-block d-inline-flex pt-2 pr-2" src="https://static.pingendo.com/img-placeholder-1.svg" width="80">
            <div class="row d-inline-flex mb-0">
              <div class="col-md-12 mb-0">
                <h1 class="display-5 mb-0"><?php echo $datasEvent['Titre'];?></h1>
                <p class="text-justify d-inline-block mb-0">
                  <p class="text-justify d-inline-block mb-0"><?php echo $datasEvent['Heure'];?></p>
                  <p class="text-justify d-inline-block mb-0 ml-1 mr-1">-</p>
                  <p class="text-justify d-inline-block mb-0"><?php echo $datasEvent['Date_evenement'];?></p>
                </p>
                <p class="text-justify d-inline-block mb-0">
                  <i class="fas fa-map-marker-alt pr-1" style="color:blue"></i>
                    <?php echo $datasEvent['Lieu'];?>
                  </p>
                <p class="text-justify"><?php echo $datasEvent['Nbr_participants'].' Participants'; ?></p>
                <!-- TODO Afficher cette partie si membre du BDE -->
                <div class="col-md-12 d-inline-flex p-0 m-0">
                  <p class="text-justify pr-1">Etat :</p>
                  <p class="text-justify mr-2 m-0 p-0">Public / Privé</p>
                </div>
              </div>
            </div>
          </div>
          <!-- TODO Afficher cette partie si membre du BDE -->
          <div class="col-md-6 col-12 order-0 order-md-1"> 
            <a class="btn btn-primary" href="#"><i class="fas fa-times"></i></a>
            <a class="btn btn-primary" href="#"><i class="fas fa-cog"></i></a>
            <a class="btn btn-primary" href="#">Télécharger la liste des inscrits</a>
          <!-- TODO Afficher cette partie si membre du CESI -->
            <a class="btn btn-primary" href="#"><i class="fas fa-user-secret"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 p-0 m-0" style="">
            <p class="text-justify pr-3 pl-3"><?php echo $datasEvent['Description'];?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 d-inline-flex">
            <p class="text-justify pr-1">62</p>
            <p class="text-justify">Photos</p>
          </div>
          <!-- TODO activer quand l'évènement est à venir -->
          <div class="row">
            <div class="col-md-12 d-inline-flex">
              <a class="btn btn-primary align-items-center d-flex" href="#">Participer</a>
              <div class="col-md-12">
                <h5 class="text-justify d-inline-flex m-0" font size="10">Coût de participation :</h5>
                <h5 class="text-justify d-inline-flex m-0"><?php echo $datasEvent['Cout'];?></h5>
                <h5 class="text-justify d-inline-flex m-0">€</h5>
                <h6 class="text-justify m-0">(à régler avec votre BDE au maximum la veille)</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </body>
</html>