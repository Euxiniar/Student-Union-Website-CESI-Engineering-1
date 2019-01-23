<?php

$email = htmlspecialchars($_POST['emailsignup']);
$mdp =  htmlspecialchars( $_POST['mdpsignup']);

$belongsToCesi = (preg_match("#@viacesi.fr#", $email) || preg_match("#@cesi.fr#", $email) )? true : false;
$ERROR = false;

if ($belongsToCesi){
    include("../scripts/setConnexionLocalBDD.php");

/*    $emailExist = $local_bdd->query('call local_bde.spt_email(\''. $email . '\');');
    $resultEmail = $emailExist->fetch();
    $emailExist->closeCursor();*/

    //if the email exist, we get the datas of the user

    $user = $local_bdd->query('call orleans_bde.sps_user_by_email(\'' . $email . '\');');
    $datasUser = $user->fetch();
    $user->closeCursor();

    if (isset($datasUser['Id_utilisateur'])) {

        $gender = $local_bdd->query('call orleans_bde.sps_genre(\'' . $datasUser['Id_genre'] . '\');');
        $dataGender = $gender->fetch();
        $gender->closeCursor();

        $status = $local_bdd->query('call orleans_bde.sps_status(\'' . $datasUser['Id_Status'] . '\');');
        $datasStatus = $status->fetch();
        $status->closeCursor();

        $campus = $local_bdd->query('call orleans_bde.sps_centre(\'' . $datasUser['Id_centre'] . '\');');
        $datasCampus = $campus->fetch();
        $campus->closeCursor();

        //check the validity of the passwork
        if ($datasUser['Mdp'] == md5($mdp)) {
            if (isset($_SESSION['id'])){
                session_destroy();
            }
            session_start();
            $_SESSION['email'] = $datasUser['Email'];
            $_SESSION['l_name'] = $datasUser['Nom'];
            $_SESSION['f_name'] = $datasUser['Prenom'];
            $_SESSION['campus'] = $datasCampus;
            $_SESSION['status'] = $datasStatus;
            $_SESSION['Gender']  = $dataGender;
            $_SESSION['id'] = $datasUser['Id_utilisateur'];
            echo '<p><a class="confirm" href ="../connected/home.php">Vous êtes connecté.</a></p>';

        } else {
            echo '<li class="alert" >Le mot de passe ne correspond pas. Veuillez vérifier que vous n\'avez pas fait d\'erreur en le recopiant.</li>';
        }
    }
    else{
        echo '<li class="alert" >Cette adresse email n\'existe pas dans notre base de données. Veuillez la vérifier.</li>';
        $ERROR = true;
    }
}
else{
    echo '<li class="alert" >Cette adresse email n\'est pas valide. Vous devez appartenir au cesi pour pouvoir vous connecter.</li>';
    $ERROR = true;
}

