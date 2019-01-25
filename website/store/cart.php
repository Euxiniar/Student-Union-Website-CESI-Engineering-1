<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Panier - Boutique - BDE CESI Orléans</title>
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
                $idcom = $datasEvent['Id_commande'];
                include("./cart-item.php"); 
            }
            include_once("./cart-total.php"); 
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
</script>

<script>
        function processEmptyCart(Id_Commande) {
            $.ajax({
                type: "POST",
                url: "emptyCart.php",
                data: {
                    Id_Commande: Id_Commande
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
</script>

<script>
function processNewQty(ArticleID)
{
    if (ArticleID == "")
    {
        /* If there's nothing in the field, leave it as is. The empty value is not sent to the database. */
        console.warn("Le champ Quantité est vide. Une valeur est attendue afin d'être traitée.")
    } else {
        /* There's a new value, so we update in database. */
        alert(ArticleID);
    }
}

</script>

</body>

</html>