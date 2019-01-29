<?php
include("../scripts/setConnexionLocalBDD.php");


$creationDate = date("Y-m-d");

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
$hours = date("H-i-s");
$nomNewFichier = htmlspecialchars($_SESSION['id'].'-'.$creationDate.'-' . $hours . '-' . $_FILES['filebutton']['name']);
/*echo $nomNewFichier. '<br>';;*/
$url = '../assets/img/couvertures/'.$nomNewFichier;
/*echo $url;*/
$resultat = move_uploaded_file($_FILES['filebutton']['tmp_name'],$url);
if (!$resultat)
    $erreur = "Erreur de transfert". '<br>';

if ($erreur = 'pas derreur') {
    /*Fin de la vérification*/
    $replace = "\\\'";

    $titre = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['title']));
    $date = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['date']));
    /*$creationDate*/ /*defini plus haut*/
    $endDate = null;
    $hour = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['time']));
    $description = preg_replace("#'|\"#", $replace, html_entity_decode(htmlspecialchars($_POST['description']),ENT_QUOTES));


    $cout = htmlspecialchars($_POST['quantity']);
    $nbrParticipants = 0;
    /*$url*/ /*defini plus haut*/
    $nbrVotes = 0;
    $adresse = preg_replace("#'|\"#", $replace, htmlspecialchars($_POST['address']));
    $idUtilisateur = $_SESSION['id'];
    $idRecurrence = $_POST['recurrence'];
    $isIdea = 1;
    if (isset($_POST['id_status_date']))
        $idDate = $_POST['id_status_date'];
    else
        $idDate = null;
        $idAccessibilite = 1;

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
    if (!isset($_POST['id_status_date'])) {
        $query =
            'call orleans_bde.spi_evenement(
    \'' . $titre . '\',  
    \'' . $date . '\',  
    \'' . $creationDate . '\',  
    \'' . $date . '\',   
    \'' . $hour . '\',
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

        /*    echo $query;*/

        $local_bdd->query($query);
        echo '<meta http-equiv="refresh" content="0; URL=../idea_box/AccueilBoxIdea.php">';
    }
    else {
        $query =
            'call orleans_bde.spi_evenement_tocome(
    \'' . $titre . '\',  
    \'' . $date . '\',  
    \'' . $creationDate . '\',  
    \'' . $date . '\',   
    \'' . $hour . '\',
    \'' . $description . '\',  
    ' . $cout . ',
    ' . $nbrParticipants . ',
    \'' . $url . '\',  
    ' . $nbrVotes . ',
    \'' . $adresse . '\',  
    ' . $idUtilisateur . ',
    ' . $idRecurrence . ',
    ' . $isIdea . ',
    ' . $idDate . ',
    ' . $idAccessibilite . ');';
        /*    echo $query;*/

        $local_bdd->query($query);
        echo '<meta http-equiv="refresh" content="0; URL=../events_to_come/index.php">';
    }


}
else {
    echo '<p> Une erreur a été rencontrée lors de l\'upload du fichier </p>';
}
?>