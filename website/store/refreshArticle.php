<!-- WORKING FILE ! DO NOT EDIT ! -->

<?php
session_start();
    include("../scripts/setConnexionLocalBDD.php");
    $article = $local_bdd->query('call orleans_bde.sps_article()');

    /* Check if the response from database is empty */
    if ($article->rowCount() == 0) { 
        /* It's empty, so we tell the user to add a product to his cart */
        echo "<h1>Plus d'article dans la boutique!.</h1>";
        echo "<p>Rupture de stock !</p>";
    } else {
        /* It's not empty, we display the formatted results */
        while($datasItemStore = $article->fetch()){
            include("./item-box.php");
        }
    
        $article->closeCursor();
    }
                       

?>