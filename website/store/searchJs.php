<?php
session_start();
if(isset($_GET["searchBarInput"]) && isset($_GET["category"]))
{
    $search = $_GET['searchBarInput'];
    $category = $_GET['category'];
    include("../scripts/setConnexionLocalBDD.php");
    $article = $local_bdd->query("call orleans_bde.sps_get_article_based_on_search_filters('$search', '$category');");

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