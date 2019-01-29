<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Panier - Boutique - BDE CESI Orléans</title>
    <link href="../assets/css/reset.css" rel="stylesheet">
    <link href="../assets/css/cart.css" rel="stylesheet">
    <?php $PAGE="Panier" ;?>

</head>

<body>
    <!-- Add the header -->
    <?php include( "../common/header.php") ?>
    <div id="product-list"> <!-- On fait une div avec l'ID product-list (le nom peut être différent mais mettre un ID est TRES IMPORTANT) -->
            <?php if (isset($_SESSION['id'])) {  /* Démarre session */
            include( "../scripts/setConnexionLocalBDD.php"); /* Inclut Script Connexion */
            $itemsInOrder=$local_bdd->query("call orleans_bde.spl_order_by_user_and_order_status({$_SESSION['id']});"); /* On appelle la procédure stockée qui retourne */
            /* tous le contenu du panier, donc de article_par_commande sur la base de l'ID de session */
            if ($itemsInOrder->rowCount() == 0) /* Si aucune valeur n'est retournée (panier vide) */
            { /* It's empty, so we tell the user to add a product to his cart */
                echo "
        <h1>Votre panier est vide.</h1>"; 
        echo "
        <p>Ajoutez des produits !</p>";} 
        else { 
            /* It's not empty, we display the formatted results */ 
            include_once("./cart-top.php"); /* On inclut une seule fois le haut du panier */
            while($datasEvent = $itemsInOrder->fetch()) /* On prend toutes les lignes une a une */
            { 
                $idcom = $datasEvent['Id_commande'];
                include("./cart-item.php"); /* On génère le cart-item.php, qui correspond à une ligne du panier, donc on génère autant de fois que de lignes retournées */
            }
            include_once("./cart-total.php"); /* On inclut une seule fois le bas du panier */
            $itemsInOrder->closeCursor(); } /* Close */
        } 
        else 
        { 
            echo "<h1> Vous devez être connectés. </h1>";  /* Si _SESSION['id'] n'est pas défini, on affiche ce message uniquement. */
        } ?>
    </div>

    <!-- Add the footer -->
    <?php include( "../common/footer.php") ?>

    <script>
        function processRemoveItem(Id_Article) { /* On fait la fonction avec en paramètre une variable "Id_Article"  */
            $.ajax({ // On fait la fonction AJAX
                type: "POST", // Type de requête
                url: "removeItem.php", // Le fichier .php a quoi envoyer la requête
                data: { // Le contenu de la requête (headers)
                    ArticleID: Id_Article // On fait le header "ArticleID" qui aura pour valeur la variable Id_Article passée en param de la fonction JS
                },
                success: function(result) { // Lorsque la requête a été exécutée
                    $(document).ready(function() {
                        $.get('refreshItems.php', function(response) { // On exécute la fonction de rafraichissement de page
                        // Cette fonction retourne du HTML uniquement (il regénère un bout de page dans mon cas)
                            $('#product-list').html(response); // On remplace le contenu de la div portant l'ID "product-list" par le code HTML retourné par refreshItems.php
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
function processNewQty(params)
{
    if (params.Qty == "")
    {
        /* If there's nothing in the field, leave it as is. The empty value is not sent to the database. */
        console.warn("Le champ Quantité est vide. Une valeur est attendue afin d'être traitée. BDD non modifiée.")
    } else {
        /* There's a new value, so we update in database. */
        var Quantity = params.Qty;
        var ArticleID = params.ArticleID;
        $.ajax({
                type: "POST",
                url: "updateItemQuantity.php",
                data: {
                    Quantity: Quantity,
                    ArticleID: ArticleID
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
}

</script>

</body>

</html>