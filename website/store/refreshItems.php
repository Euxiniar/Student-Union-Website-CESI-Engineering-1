<!-- WORKING FILE ! DO NOT EDIT ! -->

<?php
session_start();
    include("../scripts/setConnexionLocalBDD.php");
    $itemsInOrder = $local_bdd->query("call orleans_bde.spl_order_by_user_and_order_status({$_SESSION['id']});");

    /* Check if the response from database is empty */
    if ($itemsInOrder->rowCount() == 0) { 
        /* It's empty, so we tell the user to add a product to his cart */
        echo "<h1>Votre panier est vide.</h1>";
        echo "<p>Ajoutez des produits !</p>";
    } else {
        /* It's not empty, we display the formatted results */
        include_once("./cart-top.php");
       while($datasEvent = $itemsInOrder->fetch()){
           include("./cart-item.php");
       }
       include("./cart-total.php");
       $itemsInOrder->closeCursor();
    }
                       

?>