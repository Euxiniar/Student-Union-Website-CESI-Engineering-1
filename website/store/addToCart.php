<?php session_start();

if(isset($_SESSION['id'], $_POST['Quantity'], $_POST['Id_Article']))
{
    $Quantity = $_POST['Quantity'];
    $ArticleID = $_POST['Id_Article'];
    include("../scripts/setConnexionLocalBDD.php");
    $query = $local_bdd->query("call orleans_bde.spe_cart({$_SESSION['id']}, $Quantity, $ArticleID);");
} else {
    echo "Incorrect parameters.";
} ?>
