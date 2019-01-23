<?php
include("../scripts/setConnexionLocalBDD.php");


$creationDate = date("Y-m-d");

/*Vérification du fichier upload*/

$erreur = 'pas derreur';
if ($_FILES['filebutton']['error'] > 0)
    $erreur = "Erreur lors du transfert". '<br>';
echo $erreur;
if ($_FILES['filebutton']['size'] > 1048576) /*1Mo*/
    $erreur = "Le fichier est trop gros". '<br>';
echo $erreur;

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['filebutton']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) )
    echo "Extension correcte". '<br>';
else {
    $erreur = "L'extension n'est pas valide". '<br>';
}
echo $erreur;

$nomNewFichier = htmlspecialchars($_SESSION['id'].'-'.$creationDate.'-'.$_FILES['filebutton']['name']);
echo $nomNewFichier. '<br>';;
$url = '../assets/img/couvertures/'.$nomNewFichier;
$resultat = move_uploaded_file($_FILES['filebutton']['tmp_name'],$url);
if ($resultat)
    echo "Transfert réussi". '<br>';
else {
    $erreur = "Erreur de transfert". '<br>';
}
if ($erreur = 'pas derreur') {
    /*Fin de la vérification*/
    $replace = "\\\'";

    $titre = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['title']));
    $date = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['date']));
    /*$creationDate*/ /*defini plus haut*/
    $endDate = null;
    $description = preg_replace("#'|\"#", $replace, html_entity_decode(htmlspecialchars($_POST['description']),ENT_QUOTES));


    $cout = htmlspecialchars($_POST['quantity']);
    $nbrParticipants = 0;
    /*$url*/ /*defini plus haut*/
    $nbrVotes = 0;
    $adresse = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['address']));
    $idUtilisateur = $_SESSION['id'];
    $idRecurrence = $_POST['recurrence'];
    $isIdea = 1;
    $idDate = null;
    $idAccessibilite = 1;

    /*$recurrence = $local_bdd->query('call orleans_bde.sps_recurrence(\'' . htmlspecialchars($_POST['recurrence']) . '\');');
    $dataRecurrence = $recurrence->fetch();
    $recurrence->closeCursor();*/


    echo $titre . '<br>';
    echo $date . '<br>';
    echo $creationDate . "<br>";
    echo $endDate . '<br>';
    echo $description . '<br>';
    echo $cout . '<br>';
    echo $nbrParticipants . '<br>';;
    echo $url . '<br>';
    echo $nbrVotes . '<br>';
    echo $adresse . '<br>';
    echo $idUtilisateur . '<br>';
    echo $idRecurrence . '<br>';
    echo $isIdea . '<br>';
    echo $idDate . '<br>';
    echo $idAccessibilite . '<br>';


    /*date de debut mise temporairement en attente dune amelioration du formulaire de création*/
    $query =
        'call orleans_bde.spi_evenement(
    \'' . $titre . '\',  
    \'' . $date . '\',  
    \'' . $creationDate . '\',  
    \'' . $date . '\',   
    \'' . $description . '\',  
    ' . $cout . ',
    ' . $nbrParticipants . ',
    \'' . $url . '\',  
    ' . $nbrVotes . ',
    \'' . $adresse . '\',  
    ' . $idUtilisateur . ',
    ' . $idRecurrence . ',
    ' . $isIdea . ',
    ' . $idAccessibilite . ');';

    echo $query;

    $local_bdd->query($query);

}
else {
    echo '<p> Une erreur a été rencontrée lors de l\'upload du fichier </p>';
}

?>