<?php session_start();
if(isset($_POST['Id_commande']))
{
    $idCommande = $_POST['Id_commande'];
    include("../scripts/setConnexionLocalBDD.php");
    $query = $local_bdd->query("call orleans_bde.spl_order_empty_cart({$_SESSION['id']}, $idCommande);");
    if($query) // will return true if successful else it will return false
    {
    /* If required if Yes */
    } else {
    /* If required if No */
    }

} ?>
