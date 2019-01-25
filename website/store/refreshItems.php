<!-- WORKING FILE ! DO NOT EDIT ! -->

<?php
session_start(); /* Start Session */
    include("../scripts/setConnexionLocalBDD.php"); /* Script co */
    $itemsInOrder = $local_bdd->query("call orleans_bde.spl_order_by_user_and_order_status({$_SESSION['id']});"); /* On récupère le contenu du panier sur base id user */

    /* Check if the response from database is empty */
    if ($itemsInOrder->rowCount() == 0) { // Bref..
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