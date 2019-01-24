<?php session_start();
if(isset($_POST['Id_commande']))
{
    $idArticle = $_POST['Id_Cart'];
    echo "Type : Empty Cart, ID Cart : $idCart";
    include("../scripts/setConnexionLocalBDD.php");
    $query = $local_bdd->query("call orleans_bde.spl_order_empty_cart({$_SESSION['id']}, $idCart);");
    if($query) // will return true if successful else it will return false
    {
    echo "Yes !";
    } else {
        echo "No !";
    }

} ?>
