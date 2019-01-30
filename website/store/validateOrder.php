<?php session_start(); ?>

<?php include_once ("../common/header.php") ?>


<?php if(isset($_SESSION['id'])){

    $id_user = $_SESSION['id'];

    include("../scripts/setConnexionLocalBDD.php");

    // We get the content of order (articles)
    $get1 = $local_bdd->query("call orleans_bde.sps_cart_list_order_not_paid($id_user)");
    $get1->closeCursor();



    // We get the order status (not paid)
    $get2 = $local_bdd->query("call orleans_bde.sps_cart_list_order_not_paid($id_user)");
    $orderList = $get2->fetch();
    $id_commande = $orderList['Id_commande'];
    $get2->closeCursor();

    

    // We get the total price (sum_cost)
    $get3 = $local_bdd->query("call orleans_bde.sps_get_total_price($id_user)");
    $get3->closeCursor();





    // We set the order to paid (Commande_payee = 1) 
    $set1 = $local_bdd->query("call orleans_bde.spe_cart_set_order_paid($id_user)");
    $set1->closeCursor();


    // We send the mail

    $query = $local_bdd->query('call orleans_bde.sps_user('. $id_user .')');
    $DatasUser = $query->fetch();
    $query->closeCursor();

    $query = $local_bdd->query('call orleans_bde.sps_commande('. $id_commande .')');
    $DatasCommande = $query->fetch();
    $query->closeCursor();

    $sujet = 'Confirmation de commande';
    $message = '
        <strong>Votre commande est validée</strong><br />
        <p>Bonjour ' . $DatasUser['Prenom'] . ',<br /> Le site du BDE CESI Orléans vous confirme que votre commande n° ' . $DatasCommande['Id_commande'] .', payée le ' . $DatasCommande['Date'] .' à ' . $DatasCommande['Heure'] .' est validée. Munissez vous de ce bon de reception et rendez-vous au CESI pour la réception de votre commande. 
         <br /> Merci d\'avoir acheté sur la boutique de notre site, à très bientôt !<br />
         Cordialement, <br />
         Les membres du site du BDE CESI Orléans.
         </p>
        ';

    $destinataire = $DatasUser['Email'];
    $headers = "From: \"BDE CESI Orléans\"<orleans@bde.studisys.net>\n";
    $headers .= "Reply-To: orleans@bde@cesi.fr\n";
    $headers .= "Content-Type: text/html; charset=\"utf8\"";
    mail($destinataire,$sujet,$message,$headers);

    $sujet = 'Commande passée';
    $message = '
        <strong>L\'utilisateur '.$DatasUser['Prenom'].' ' . $DatasUser['Nom'] . ' à payé la commande n°'. $DatasCommande['Id_commande'] . ', payée le ' . $DatasCommande['Date'] .' à ' . $DatasCommande['Heure'] .' d\'un prix total de ' .$DatasCommande['Cout_total'] . ' </strong><br />';

    $membresBDE = $local_bdd->query('call orleans_bde.spl_utilisateur_bde();');
    $destinataire = '';
    while($userBDE = $membresBDE->fetch()) {
        $destinataire .= ', ' . $userBDE['Email'];
    }
    $membresBDE->closeCursor();
    $headers = "From: \"BDE CESI Orléans\"<orleans@bde.studisys.net>\n";
    $headers .= "Reply-To: orleans@bde@cesi.fr\n";
    $headers .= "Content-Type: text/html; charset=\"utf-8\"";
    mail($destinataire,$sujet,$message,$headers);
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


$get1->closeCursor();




}
else {
    echo "<h1> Vous devez être connectés. </h1>";
}
?>


<?php include ("../common/footer.php") ?>