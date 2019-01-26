

  <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>		      <link rel="stylesheet" href="../assets/css/comments.css">
        <title>BDE CESI Exia</title>
        <?php $PAGE = "home" ?>
    </head>
    <body>
        <?php 
            include("../scripts/setConnexionLocalBDD.php"); 
            $events = $local_bdd->query('call orleans_bde.spl_evenement_passed();');
            $datasEvent = $events->fetch();
            $events->closeCursor();
            $query = 'call orleans_bde.sps_user('.$datasEvent['Id_utilisateur'].');';
            $user = $local_bdd->query($query);
            $datasUser = $user->fetch();
            $user->closeCursor();
        ?>
        <div class="py-5" >
            <div class="container comment_box">
                <div class="row">
                    <div class="col-md-12 d-inline-flex p-0 m-0 pl-3 pt-2 header_comment">
                    <p class="text-justify mr-1 mb-0"><?php echo $datasUser['Nom'];?></p>
                    <p class="text-justify mr-1 mb-0"><?php echo $datasUser['Prenom'];?></p>
                    <p class="text-justify mr-1 mb-0"><?php echo $datasUser['Email'];?></p>
                    <p class="text-justify mb-0">à</p>
                    <p class="text-justify mr-1 mb-0"><?php echo $datasEvent['Heure'];?></p>
                    <p class="text-justify mr-1 mb-0">le</p>
                    <p class="text-justify mb-0"><?php echo $datasEvent['Date_evenement'];?></p>
                    </div>
                </div>
                <hr class="p-0 m-0">
                <div class="row">
                    <div class="col-md-12 p-0 mt-3">
                        <p class="text-justify pr-3 pl-3"><?php echo $datasEvent['Description'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>