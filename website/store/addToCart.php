<?php session_start();

if(isset($_SESSION['id'], $_POST['Quantity'], $_POST['Id_Article']))
{
    $IdUser = $_SESSION['id'];
    $Quantity = $_POST['Quantity'];
    $ArticleID = $_POST['Id_Article'];
    include("../scripts/setConnexionLocalBDD.php");
    $check1 = $local_bdd->query("call orleans_bde.sps_cart_list_order_not_paid($IdUser)");
    $check1->closeCursor();
    $count = $check1->rowCount();
    if ($count == 0) {
        // If there's nothing in the cart

        // We create the cart
        // IdUser ; Total Cost ; Number of Items ; 
        $CurrentDate = date("Y-m-d");
        $CurrentTime = date("H:i:s");
        $Commande_payee = "0";
        $insert1= $local_bdd->query("call orleans_bde.spi_cart_create_new_cart($IdUser, 0, 0, '".date('Y:m:d')."', '".date('H:i:s')."', $Commande_payee)");
        $insert1->closeCursor();
        // We get the new row and we extract the Order ID
        $check2 = $local_bdd->query("call orleans_bde.sps_cart_list_order_not_paid($IdUser)");
        $fetchIdCommande = $check2->fetch();
        $check2->closeCursor();
        $IdOrder = $fetchIdCommande["Id_commande"];

        // We add the product to the cart
        $insertItemInCart = $local_bdd->query("call orleans_bde.spi_cart_add_new_item_to_cart($IdOrder, $ArticleID, $Quantity)");
        $insertItemInCart->closeCursor();
    } else {
    // If there's something in the cart

    // We check if the item is already in the cart
    $check3 = $local_bdd->query("call orleans_bde.sps_cart_check_if_already_in_cart($IdUser, $ArticleID)");
    $check3->closeCursor();
    if ($count == 0) {
         // If the item isn't in the cart
         $check4 = $local_bdd->query("call orleans_bde.sps_cart_list_order_not_paid($IdUser)");
         $fetchIdCommande = $check4->fetch();
         $check4->closeCursor();
         $IdOrder = $fetchIdCommande["Id_commande"];
            // Then we add the item to the cart
            $insertItemInCart2 = $local_bdd->query("call orleans_bde.spi_cart_add_new_item_to_cart($IdOrder, $ArticleID, $Quantity)");
            $insertItemInCart2->closeCursor();
        } else {
            // If the item is in the cart
            $check5 = $local_bdd->query("call orleans_bde.sps_cart_list_order_not_paid($IdUser)");
            $fetchIdCommande = $check5->fetch();
            $check5->closeCursor();
            $IdOrder = $fetchIdCommande["Id_commande"];
            // Then we update the item quantity
            $updateItemQtyInCart = $local_bdd->query("call orleans_bde.spe_commande_item_quantity($IdOrder, $Quantity, $ArticleID)");
            $updateItemQtyInCart->closeCursor();
        }

    }

} else {
    echo "Incorrect parameters.";
} ?>
