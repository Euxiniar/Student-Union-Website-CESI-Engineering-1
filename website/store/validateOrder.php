<?php session_start(); ?>

<?php include_once ("../common/header.php") ?>


<?php if(isset($_SESSION['id'])){

    $IdUser = $_SESSION['id'];

    include("../scripts/setConnexionLocalBDD.php");

    // We get the order
    $get1 = $local_bdd->query("call orleans_bde.sps_cart_list_order_not_paid($IdUser)");

    
?>

<div class="jumbotron text-xs-center">
  <h1 class="display-3">Merci !</h1>
  <p class="lead"><strong>Prenez contact avec votre BDE</strong> afin de finaliser le paiement et la remise de votre commande.</p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="../" role="button">Accueil</a>
    <a class="btn btn-primary btn-sm" href="./store" role="button">Boutique</a>
  </p>
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