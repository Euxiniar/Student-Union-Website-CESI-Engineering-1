<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Panier - Boutique - BDE CESI Orléans</title>
    <!-- TODO : Unify the assets source for the whole BDE project. -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../assets/css/reset.css" rel="stylesheet">
    <link href="../assets/css/cart.css" rel="stylesheet">
    <?php $PAGE="cart" ;?>

</head>

<body>
    <!-- Add the header -->
    <?php include( "../common/header.php") ?>
    <div id="product-list">
        <?php if (isset($_SESSION['id'])) { 
            include( "../scripts/setConnexionLocalBDD.php"); 
            $itemsInOrder=$local_bdd->query("call orleans_bde.spl_order_by_user_and_order_status({$_SESSION['id']});"); /* Check if the response from database is empty */
            if ($itemsInOrder->rowCount() == 0) 
            { /* It's empty, so we tell the user to add a product to his cart */
                echo "
        <h1>Votre panier est vide.</h1>"; 
        echo "
        <p>Ajoutez des produits !</p>";} 
        else { 
            /* It's not empty, we display the formatted results */ 
            include_once("./cart-top.php");
            while($datasEvent = $itemsInOrder->fetch())
            { 
                include("./cart-item.php"); 
            }
            include("./cart-total.php"); 
            $itemsInOrder->closeCursor(); } 
        } 
        else 
        { 
            echo "<h1> Vous devez être connectés. </h1>"; 
        } ?>
    </div>

    <!-- Add the footer -->
    <?php include( "../common/footer.php") ?>

    <script>
        function processRemoveItem(Id_Article) {
            $.ajax({
                type: "POST",
                url: "removeItem.php",
                data: {
                    Id_Article: Id_Article
                },
                success: function(result) {
                    $(document).ready(function() {
                        $.get('refreshItems.php', function(response) {
                            $('#product-list').html(response);
                        });
                    });
                }
            });
        }


        function processEmptyCart(Id_Commande) {
            $.ajax({
                type: "POST",
                /* POST Request */
                url: "emptyCart.php",
                /* PHP containing desired function */
                data: {
                    Id_Commande: Id_Commande /* The parameter sent to the PHP file as header */
                },
                /* If the query to the PHP file is successful */
                success: function(result) {
                    $(document).ready(function() {
                        /* We generate the new HTML for the div containing the items */
                        $.get('refreshItems.php', function(response) {
                            /* We replace the content of the div with the newly generated HTML and we refresh this div ONLY once*/
                            $('#product-list').html(response);
                            /* Updated div :-) */
                        });
                    });
                }
            });
        }
    </script>

</body>

</html>