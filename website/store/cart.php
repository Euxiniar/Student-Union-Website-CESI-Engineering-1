<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Panier - Boutique - BDE CESI Orléans</title>



    <!-- TODO : Unify the assets source for the whole BDE project. -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../assets/css/cart.css" rel="stylesheet">
    <link href="../assets/css/reset.css" rel="stylesheet">
    <?php $PAGE="cart" ; ?>

</head>

<body>
    <!-- Add the header -->
    <?php include( "../common/header.php") ?>

<?php

if (isset($_SESSION['id']))
{
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
                       
} else {
    echo "<h1> Vous devez être connectés. </h1>";
}
?>

    <!-- Add the footer -->
    <?php include( "../common/footer.php") ?>
    
</body>

</html>