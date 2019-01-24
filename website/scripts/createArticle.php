<?php
include("../scripts/setConnexionLocalBDD.php");


$creationDate = date("Y-m-d");

/*Vérification du fichier upload*/

$erreur = 'pas derreur';
if ($_FILES['filebutton']['error'] > 0)
    $erreur = "Erreur lors du transfert". '<br>';
/*echo $erreur;*/
if ($_FILES['filebutton']['size'] > 1048576) /*1Mo*/
    $erreur = "Le fichier est trop gros". '<br>';
/*echo $erreur;*/

$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['filebutton']['name'], '.')  ,1)  );
if ( !in_array($extension_upload,$extensions_valides) )
    $erreur = "L'extension n'est pas valide". '<br>';

/*echo $erreur;*/
$hours = date("H-i-s");
$nomNewFichier = htmlspecialchars($_SESSION['id'].'-'.$creationDate.'-' . $hours . '-' . $_FILES['filebutton']['name']);
/*echo $nomNewFichier. '<br>';;*/
$url = '../assets/img/articles/'.$nomNewFichier;
$resultat = move_uploaded_file($_FILES['filebutton']['tmp_name'],$url);
/*if ($resultat)
    echo "Transfert réussi". '<br>';
else {
    $erreur = "Erreur de transfert". '<br>';
}*/
if ($erreur = 'pas derreur') {
    /*Fin de la vérification*/
    $replace = "\\\'";

    $titre = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['titre']));
    /*$creationDate*/ /*defini plus haut*/

    $description = preg_replace("#'|\"#", $replace, html_entity_decode(htmlspecialchars($_POST['description']),ENT_QUOTES));


    $cout = htmlspecialchars($_POST['cout']);
    /*$url*/ /*defini plus haut*/
    $stock = $_POST['stock'];
    $idCategory = $_POST['category'];
    $Nbr_achats = '0';

    /*$recurrence = $local_bdd->query('call orleans_bde.sps_recurrence(\'' . htmlspecialchars($_POST['recurrence']) . '\');');
    $dataRecurrence = $recurrence->fetch();
    $recurrence->closeCursor();*/


/*    echo $titre . '<br>';
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
    echo $idAccessibilite . '<br>';*/


    /*date de debut mise temporairement en attente dune amelioration du formulaire de création*/
    $query =
        'call orleans_bde.spi_article(
    \'' . $titre . '\',  
    \'' . $description . '\',  
    ' . $cout . ',
    \'' . $url . '\',
    ' . $stock . ',
    ' . $Nbr_achats . ' , 
    ' . $idCategory . ');';


/*    echo $query;*/


$local_bdd->query($query);
echo '<meta http-equiv="refresh" content="0; URL=../store/index.php">';

}
else {
echo '<p> Une erreur a été rencontrée lors de l\'upload du fichier </p>';
}
?>