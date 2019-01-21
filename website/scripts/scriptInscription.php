<?php


if (isset($_POST['email'])) {
    //data recovery using the post method and protection against injections
    $email= htmlspecialchars($_POST['email']);
    $mdp =  htmlspecialchars( $_POST['mdp']);
    $mdp2 = htmlspecialchars( $_POST['mdp2']);
    $ERROR = false;

/*    //test of the existence of the email address
    $numberEmail = $global_bde->query('call global_bde.spt_email(\''. $email . '\');');
    $resultEmail = $numberEmail->fetch();
    $numberEmail->closeCursor();*/

    // test of the coherence  of the email address
    $belongsToCesi = (preg_match("#@viacesi.fr#", $email) || preg_match("#@cesi.fr#", $email) )? true : false;

    if (!$belongsToCesi){
        echo '<li class="alert" >Vous ne semblez pas appartenir au cesi, vous ne pouvez donc pas vous inscrire.</li>';
        $ERROR = true;
    }

/*    if ($resultEmail[0] < 1) {
        echo '<li class="alert" >Cette adresse mail n\'existe pas dans notre base de données, veuillez entrer l\'adresse email correspondant à votre compte étudiant CESI/li>';
        $ERROR = true;
    }*/
    if ($mdp != $mdp2) {
        echo '<li class="alert" >Les mots de passes ne sont pas identiques.</li>';
        $ERROR = true;
    }

    //test of the conditions for the validation of a password
    //(contains at least one number, one capital letter and 8 characters)
    $containMaj = preg_match("#[A-Z]#", $mdp);
    $containNumber = preg_match("#[1-9]#", $mdp);
    $sizeEnough = strlen($mdp) >= 8;

    if (!$containMaj) {
        echo '<li class="alert" >Votre mot de passe doit contenir au moins une majuscule.</li>';
        $ERROR = true;
    }
    if (!$containNumber) {
        echo '<li class="alert" >Votre mot de passe doit contenir au moins un chiffre.</li>';
        $ERROR = true;
    }
    if (!$sizeEnough) {
        echo '<li class="alert" >Votre mot de passe doit contenir au moins 8 charactères.</li>';
        $ERROR = true;
    }

    //If there is no error we get the informations from the nationnal BDD ans we create the account
    if (!$ERROR) {
        include("../scripts/setConnexionBDD.php");

        $getUser = $global_bde->query('call global_bde.spl_user_by_email(\''. $email . '\');');
        if ($getUser) {
            $user = $getUser->fetch();

            //create account
            /*$bdd->query('call orleans_bde.spi_users(\'' . 'rien' . '\', \'' . $nom . '\', \'' . $prenom . '\', \'' . $email . '\', 1, \'' . md5($mdp) . '\');');*/
            $genre = ($user['ID_Gender'] == 1)? 'Mr ' : 'Mme ';
            $message = '<p> Votre compte est désormais créé ' . $genre . $user['L_Name'] . '</p>';
            echo $message;
            echo '<p><a class="confirm" href ="../disconnected/connexion.php#tologin">Se Connecter </a></p>';
        }
        else {
            echo '<li class="alert" >Cette adresse mail n\'existe pas dans notre base de données, veuillez entrer l\'adresse email correspondant à votre compte étudiant CESI</li>';
        }
        $getUser->closeCursor();
    }
}
else {
    echo '<li class="alert" >Les champs requis n\'ont pas été remplis.</li>';
}



