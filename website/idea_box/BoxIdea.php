<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boite à idées</title>

    <link href="../assets/vendors/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/idea.css" />

</head>
<body>
<div class = "IdeaBox pb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <img alt="Photo de couverture de l'évènement" src="<?php echo $datasEvent['URL_photo'] ?>" width="160">
                    </div> <!--Image-->
                    <div class="col-md-9">
                        <t2> <?php echo $datasEvent['Titre'] ?> </t2></br>
                        <span class = "font-weight-bold">Créateur : </span><?php echo $datasEvent['Id_utilisateur'] ?> </br>
                        <span class = "font-weight-bold">Cout de participation : </span><?php echo $datasEvent['Cout'] . '€' ?> </br>
                        <span class = "font-weight-bold">Date de l'évènement : </span><?php echo $datasEvent['Date_evenement'] ?> </br>
                        <span class = "font-weight-bold">Lieu de l'évènement : </span><?php echo $datasEvent['Lieu'] ?> </br>
                        <span class = "font-weight-bold">État : </span><?php echo ' <span>Public / Privé</span>' ?> </br>
                    </div> <!--Titre et données-->
                </div>
                <div class="row">
                    <div class="col-md-12"> <!--Description-->
                        <p class = "font-weight-bold">Description</p>
                        <?php echo $datasEvent['Description'] ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3 center">
                <div class="ButtonsGridIdea">
                    <div class="nbrVote">
                        <div class="VoteBox">
                            <p class = "Number"><?php echo $datasEvent['Nbr_votes'] ?></p>
                            <p class = "SmallText">votes</p>
                        </div>
                    </div>
                    <div class="VoteButton">
                        <button type="button" class="BigButton" href = "home.php">
                            Vote
                        </button>
                    </div>
                    <div class="BDECESIButtons">
                        <a class="btn btn-primary" href="#"><i class="fas fa-times"></i></a>
                        <a class="btn btn-primary" href="#"><i class="fas fa-cog"></i></a>
                    </div>
                    <div class="ValidButton">
                        <button type="button" class="buttonValid" href = "home.php">
                            Valider
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
            </div> <!--Boutons-->
        </div>
    </div>
</div>


</body>
</html>