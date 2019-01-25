<?php session_start();

if(isset($_SESSION['id'], $_POST['Quantity'], $_POST['ArticleID']))
{
    $Quantity = $_POST['Quantity'];
    $ArticleID = $_POST['ArticleID'];
    include("../scripts/setConnexionLocalBDD.php");
    $query = $local_bdd->query("call orleans_bde.spe_update_item_quantity_in_cart({$_SESSION['id']}, $Quantity, $ArticleID);");
} else {
    echo "Incorrect parameters.";
} ?>
