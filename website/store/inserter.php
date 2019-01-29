<?php if(isset($_GET['searchBarInput'], $_GET['category'], $_GET['priceLow'], $_GET['priceHigh']))
{
    $search = $_GET['searchBarInput'];
    $category = $_GET['category'];
    $priceLow = $_GET['priceLow'];
    $priceLow = $_GET['priceHigh'];
    include("../scripts/setConnexionLocalBDD.php");
    $article = $local_bdd->query("call orleans_bde.sps_get_article_based_on_search_filters('$search', '$category', '$priceLow', '$priceHigh');");
    /* Check if the response from database is empty */
    if ($article->rowCount() == 0) { 
        /* It's empty, so we tell the user to add a product to his cart */
        echo "<h2>Aucun résultat ne correspond à votre recherche.</h2>";
    } else {
        /* It's not empty, we display the formatted results */
            $counter = 0;
        while($datasItemStore = $article->fetch()){
            $counter++;
            include("./item-box.php");
        }
        $article->closeCursor();
    }    
}
else {
    include ("../scripts/setConnexionLocalBDD.php");
    $article = $local_bdd->query('call orleans_bde.sps_article()');
    $counter = 0;
    while ($datasItemStore = $article->fetch())
    {
        $counter++;
        include ("./item-box.php");
    }
    $article->closeCursor();
}?>