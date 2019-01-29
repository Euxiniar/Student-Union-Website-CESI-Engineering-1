<?php
if(!isset($_SESSION))
    session_start();
include("../scripts/setConnexionLocalBDD.php"); 
if(isset($_POST['id'])){

    if(isset($_POST['l_inscrits'])){
        echo 'coucou';
    }
    if(isset($_POST['l_inscrits'])) {
        include('../events_to_come/registered_list.php');
        $id_users_event = array();
        $participants_evenements = $local_bdd->query('call orleans_bde.sps_participant_evenement(' . $_POST['id'] . ');');

        while ($participant_evenement = $participants_evenements->fetch()) {
            $id_users_event[] = $participant_evenement['Id_utilisateur'];
        }
        $participants_evenements->closeCursor();

        $prenom = array();
        $nom = array();
        $email = array();

        foreach ($id_users_event as $id_user_event) {
            $query = $local_bdd->query('call orleans_bde.sps_user(' . $id_user_event . ');');
            $utilisateur = $query->fetch();
            $prenom[] = $utilisateur['Prenom'];
            $nom[] = $utilisateur['Nom'];
            $email[] = $utilisateur['Email'];

            $query->closeCursor();
        }

        array_to_csv_download(array(
            $prenom, // this array is going to be the first row
            $nom,
            $email), // this array is going to be the second row
            "l_inscrits.csv"
        );
        exit();
    } else if(isset($_POST['l_inscrits_pdf'])) {
        include("../scripts/pdf_l_inscrit.php");
    } else if(isset($_POST['delete'])){
        $local_bdd->query('call orleans_bde.spd_evenement_by_id('.$_POST['id'].');');
        $_POST['delete'] = NULL;
    } else if(isset($_POST['private'])){
        $query= $local_bdd->query('call orleans_bde.spe_evenement_status('.$_POST['id'].');');
        $query = $local_bdd->query('call orleans_bde.sps_event('.$_POST['id'].');');
        $DatasEvent = $query->fetch();
        $query->closeCursor();

        if($DatasEvent['Id_status_accessibilite']==4) {

            $sujet = 'Sujet de l\'email';
            $message = '
                    <strong>l\'évènement \''.$DatasEvent['Titre'].' \' que vous avez publié à été mis en privé</strong><br />
                    <p>Bonjour,<br /> Vous recevez ce mail car un élément que vous avez proposée sur le site du BDE du campus d\'orléans a été retiré du site par un administrateur car il ne respecte pas la charte d\'utilisation du site. <br /> Cordialement, <br /> Les membres du BDE CESI Orléans</p>
                    ';

            $user = $local_bdd->query('call orleans_bde.sps_user('. $DatasEvent['Id_utilisateur'] .')');
            $DatasUser = $user->fetch();
            $user->closeCursor();

            $destinataire = $DatasUser['Email'];
            $headers = "From: \"BDE CESI Orléans\"<orleans@bde.studisys.net>\n";
            $headers .= "Reply-To: orleans@bde@cesi.fr\n";
            $headers .= "Content-Type: text/html; charset=\"utf8\"";
            mail($destinataire,$sujet,$message,$headers);

            $message = '
                    <strong>l\'évènement \''.$DatasEvent['Titre'].' \' publié par '.$DatasUser['Prenom'].' ' . $DatasUser['Nom'] . '  à été mis en privé par '.$_SESSION['f_name'].' '. $_SESSION['l_name'] . ' et l\'utilisateur a été averti</strong><br />';

            $membresBDE = $local_bdd->query('call orleans_bde.spl_utilisateur_bde();');
            $destinataire = '';
            while($userBDE = $membresBDE->fetch()) {
                $destinataire .= ', ' . $userBDE['Email'];
            }
            $membresBDE->closeCursor();
            $headers = "From: \"BDE CESI Orléans\"<orleans@bde.studisys.net>\n";
            $headers .= "Reply-To: orleans@bde@cesi.fr\n";
            $headers .= "Content-Type: text/html; charset=\"utf8\"";
            mail($destinataire,$sujet,$message,$headers);
        }
        $_POST['private'] = NULL;

    }
    $_POST['id'] = NULL;
}
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BDE CESI Exia</title>
        
        <?php $PAGE = "Événements passés" ?>
	</head>

	<body class="common-background-white">
        <?php 
        include("../common/header.php");
        include("../idea_box/BandeauSubmitIdea.php"); ?>

        <?php        
        //$_SESSION['status']="Eleve";
        if(isset($_SESSION['status'])){
            if($_SESSION['status']=="Personnel CESI" || $_SESSION['status']=="Membre BDE") {
                $events = $local_bdd->query('call orleans_bde.spl_evenement_passed();');
            }else {
                $events = $local_bdd->query('call orleans_bde.spl_evenement_passed_public();'); 
            }
        } else {
            $events = $local_bdd->query('call orleans_bde.spl_evenement_passed_public();'); 
        }
        $id_events = array();
        while($datasEvent = $events->fetch()){
            $id_events[] = $datasEvent['Id_evenement'];
        }

        $events->closeCursor();
        
        $evenement_du_mois = 1;
        foreach ($id_events as $id_event){
            if($evenement_du_mois <=3){
                echo '<div class="text-center font-weight-bold"><i class="fas fa-medal"></i>Evénement du mois</div>';
                $evenement_du_mois += 1;
            }
            include("../events_passed/event.php");
            echo '<hr class="common-separator2">';
        }

        ?>

		<?php include("../common/footer.php") ?>
		
	</body>
</html>
