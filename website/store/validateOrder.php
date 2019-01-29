<?php session_start(); ?>

<?php include_once ("../common/header.php") ?>


<?php if(isset($_SESSION['id'])){

    $IdUser = $_SESSION['id'];

    include("../scripts/setConnexionLocalBDD.php");

    // We get the order
    $get1 = $local_bdd->query("call orleans_bde.sps_cart_list_order_not_paid($IdUser)");

    
?>


<div id="order-finalized">

<h1 class="order-finalized-title">Merci ! Votre commande a bien été passée !<h1>

<div class="yellow-alert" role="alert">
  <strong>Attention!</strong> Merci de vous adresser à votre BDE afin de finaliser le paiement et récupérer votre commande.
</div>


<p> Voici un récapitulatif de votre commande : </p>

</div>
<?php 
while($datasGet1 = $get1->fetch()){
    include("./order-final-items.php");
}


$get1->closeCursor();

// We set the order to paid
$set1 = $local_bdd->query("call orleans_bde.spe_cart_set_order_paid($IdUser)");
$set1->closeCursor();



}
else {
    echo "<h1> Vous devez être connectés. </h1>";
}
?>


<?php include ("../common/footer.php") ?>