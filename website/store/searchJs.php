<?php
session_start();
if(isset($_GET["searchBarInput"]))
{
    $search = $_GET['searchBarInput'];
    include("../scripts/setConnexionLocalBDD.php");
    $article = $local_bdd->query("call orleans_bde.sps_get_article_based_on_search_filters('$search');");

    /* Check if the response from database is empty */
    if ($article->rowCount() == 0) { 
        /* It's empty, so we tell the user to add a product to his cart */
        echo "<h2>Aucun résultat ne correspond à votre recherche.</h2>";
    } else {
        /* It's not empty, we display the formatted results */
        while($datasItemStore = $article->fetch()){
            include("./item-box.php");
        }
    
        $article->closeCursor();
    }    
}
?>