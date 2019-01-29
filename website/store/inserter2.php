<?php session_start();?>
<script type="text/javascript" src="../assets/js/store.js"> </script>
<?php if(isset( $_GET['ordre'])){

   
    $ordre = $_GET['ordre'];
    include("../scripts/setConnexionLocalBDD.php");
    echo $ordre;
    $article = $local_bdd->query("call orleans_bde.sps_get_article_based_on_search_filters2('$ordre');");
    /* Check if the response from database is empty */
    if ($article->rowCount() == 0) { 
        /* It's empty, so we tell the user to add a product to his cart */
        echo "<h2>Aucun résultat ne correspond à votre recherche.</h2>";
    } else {
        /* It's not empty, we display the formatted results */
         
        while($datasItemStore = $article->fetch()){
            echo $datasItemStore['Cout'];
            include("./item-box-search.php");
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