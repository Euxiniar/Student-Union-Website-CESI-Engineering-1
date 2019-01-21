<?php
     include("../scripts/setConnexionBDD.php");

$email = htmlspecialchars($_POST['email']);
$mdp =  htmlspecialchars( $_POST['mdp']);

$belongsToCesi = (preg_match("#@viacesi.fr#", $email) || preg_match("#@cesi.fr#", $email) )? true : false;
$ERROR = false;

if ($belongsToCesi){
    $emailExist = $global_bde->query('call global_bde.spt_email(\''. $email . '\');');
    $resultEmail = $emailExist->fetch();
    $emailExist->closeCursor();

    //if the email exist, we get the datas of the user
    if ($resultEmail[0] >= 1) {
        $user = $global_bde->query('call global_bde.spl_user_by_email(\'' . $email . '\');');
        $donnees = $user->fetch();
        $user->closeCursor();

        //check the validity of the passwork
        if ($donnees['mdp'] == md5($mdp)) {
            session_start();
            $_SESSION['email'] = $donnees['mail'];
            $_SESSION['nom'] = $donnees['nom'];
            $_SESSION['prenom'] = $donnees['prenom'];
            $_SESSION['status'] = $donnees['status'];
            $_SESSION['id'] = $donnees['idUtilisateur'];
            echo '<p><a class="confirm" href ="index.php">Vous êtes connecté.</a></p>';

        } else {
            echo '<li class="alert" >Le mot de passe ne correspond pas. Veuillez vérifier que vous n\'avez pas fait d\'erreur en le recopiant.</li>';
        }
    }
    else{
        echo '<li class="alert" >Cette adresse email n\'existe pas.</li>';
        $ERROR = true;
    }
}
else{
    echo '<li class="alert" >Cette adresse email n\'est pas valide.</li>';
    $ERROR = true;
}

