<?php

$email = htmlspecialchars($_POST['email']);
$mdp =  htmlspecialchars( $_POST['mdp']);

$belongsToCesi = (preg_match("#@viacesi.fr#", $email) || preg_match("#@cesi.fr#", $email) )? true : false;
$ERROR = false;

if ($belongsToCesi){
    include("../scripts/setConnexionLocalBDD.php");

    $emailExist = $local_bdd->query('call local_bde.spt_email(\''. $email . '\');');
    $resultEmail = $emailExist->fetch();
    $emailExist->closeCursor();

    //if the email exist, we get the datas of the user
    if ($resultEmail[0] >= 1) {
        $user = $local_bdd->query('call local_bde.spl_user_by_email(\'' . $email . '\');');
        $datasUser = $user->fetch();
        $user->closeCursor();

        $gender = $local_bdd->query('call local_bde.sps_gender(\'' . $datasUser['ID_Gender'] . '\');');
        $dataGender = $gender->fetch();
        $gender->closeCursor();

        $status = $local_bdd->query('call local_bde.sps_status(\'' . $datasUser['Status'] . '\');');
        $datasStatus = $status->fetch();
        $status->closeCursor();

        $campus = $local_bdd->query('call local_bde.sps_campus(\'' . $datasUser['ID_Campus'] . '\');');
        $datasCampus = $campus->fetch();
        $campus->closeCursor();

        //check the validity of the passwork
        if ($datasUser['mdp'] == md5($mdp)) {
            session_start();
            $_SESSION['email'] = $datasUser['Email'];
            $_SESSION['l_name'] = $datasUser['L_Name'];
            $_SESSION['f_name'] = $datasUser['F_Name'];
            $_SESSION['campus'] = $datasCampus;
            $_SESSION['status'] = $datasStatus;
            $_SESSION['Gender']  = $dataGender;
            $_SESSION['id'] = $datasUser['ID_Users'];
            echo '<p><a class="confirm" href ="index.php">Vous êtes connecté.</a></p>';

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

