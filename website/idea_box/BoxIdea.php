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
<?php
    include("../scripts/setConnexionLocalBDD.php");
    $user = $local_bdd->query('call orleans_bde.spl_evenements_idea();');
$datasEvent = $user->fetch();
    $user->closeCursor();
?>

<div class = "IdeaBox">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-2">
                <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg">
            </div>
            <div class="col-md-8">

                <t2>
                   <?php echo $datasEvent['Titre'] ?>
                </t2>
                <p>
                    Créateur de la proposition
                </p>
                <p>
                    <?php echo 'Cout de participation : ' . $datasEvent['Cout'] . '€' ?>
                </p>
                <p>
                </p>
                <p>
                    État : <span>Public / Privé</span>
                </p>


            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <dl>
                    <dt>
                        Description
                    </dt>
                    <p>
                        <?php echo $datasEvent['Description'] ?>
                    </p>

                </dl>
            </div>

            <div class="col-md-4">
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
            </div>


        </div>
    </div>
</div>

</body>
</html>