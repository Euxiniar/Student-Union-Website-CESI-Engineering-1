<html>
    <head>
    </head>

    <body class="body">
        <?php $PAGE = 'AccueilBoxIdea'; ?>
        <?php include("../common/header.php"); ?>
        <?php include("../idea_box/BandeauSubmitIdea.php"); ?>

        <?php
        include("../scripts/setConnexionLocalBDD.php");
        $user = $local_bdd->query('call orleans_bde.spl_evenements_idea();');

        while($datasEvent = $user->fetch()){
            include("../idea_box/BoxIdea.php");
            echo '<hr class = "separator">';
        }

        $user->closeCursor();

        ?>


        <?php include("../common/footer.php"); ?>

    </body>

</html>

