<?php
include("../scripts/setConnexionLocalBDD.php");

$creationDate = date("Y-m-d");
$hours = date("H:i:s");
$status = 1;
$idUtilisateur = $_SESSION['id'];
$idEvenement = $_SESSION['id_event'];
$Nbr_like = 0;
/*Vérification du fichier upload*/

$erreur = 'pas derreur';
if ($_FILES['filebutton']['error'] > 0)
    $erreur = "Erreur lors du transfert". '<br>';
/*echo $erreur;*/
if ($_FILES['filebutton']['size'] > 52428800) /*50Mo*/
    $erreur = "Le fichier est trop gros". '<br>';
/*echo $erreur;*/

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['filebutton']['name'], '.')  ,1)  );
if ( !in_array($extension_upload,$extensions_valides) )
    $erreur = "L'extension n'est pas valide". '<br>';

/*echo $erreur;*/

$nomNewFichier = htmlspecialchars($_SESSION['id'].'-'.$creationDate.'-'. $_FILES['filebutton']['name']);
/*echo $nomNewFichier. '<br>';;*/
$url = '../uploads/posts/'.$nomNewFichier;
/*echo $url;*/
$resultat = move_uploaded_file($_FILES['filebutton']['tmp_name'],$url);
if (!$resultat)
    $erreur = "Erreur de transfert". '<br>';

if ($erreur = 'pas derreur') {
    /*Fin de la vérification*/
    $replace = "\\\'";

    // $titre = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['title']));

    /*date de debut mise temporairement en attente dune amelioration du formulaire de création*/
    $query =
        'call orleans_bde.spi_photo(
    \'' . $creationDate . '\',  
    \'' . $hours . '\',  
    \'' . $status . '\',  
    \'' . $idUtilisateur . '\',
    \'' . $idEvenement . '\', 
    \'' . $Nbr_like . '\',       
    \'' . $url . '\');';

/*    echo $query;*/

    $local_bdd->query($query);
    echo '<meta http-equiv="refresh" content="0; URL=../events_passed/index_photos.php">';

}
else {
    echo '<p> Une erreur a été rencontrée lors de l\'upload du fichier </p>';
}
?>