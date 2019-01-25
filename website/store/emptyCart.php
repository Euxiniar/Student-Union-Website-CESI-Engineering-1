
<?php session_start();


if(isset($_POST['Id_Commande']))
{
    $idCommande = $_POST['Id_Commande'];
    include("../scripts/setConnexionLocalBDD.php");
    $query = $local_bdd->query("call orleans_bde.spl_order_empty_cart({$_SESSION['id']}, $idCommande);");
} ?>
