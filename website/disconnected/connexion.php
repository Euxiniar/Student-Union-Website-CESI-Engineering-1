<!DOCTYPE html>
<!--####################################
 Auteur : Anatole COUASNON
 Date : 2019
 Contexte : PROJET WEB SITE BDE
 #######################################-->

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../assets/css/style (anatole - nomAChanger).css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/styleConnexion.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/animate-custom.css" />
    <title>Connexion - Site BDE - Campus Orleans</title>
</head>

<body>
<?php $PAGE = "connexion_formx" ?>

<!-- Le corps -->
<div id="corps">

    <!-- Le menu -->
    <?php include("../common/header.php"); ?>

    <div class="container">
        <section>
            <div id="container" >
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="">
                        <form method="post" autocomplete="on" <!--action ="index.php"-->
                        <h1>Connexion</h1>
                        <p>
                            <label for="username" class="uname" data-icon="u" > Pseudo : </label>
                            <input id="username" name="email" required="required" type="text" placeholder="Adresse E-mail"/>
                        </p>

                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Mot de passe : </label>
                            <input id="password" name="mdp" required="required" type="password" placeholder="Mot de passe" />
                        </p>


                        <p class="login button">
                            <input id = "formLogin" type="submit" value="Connexion" />
<!--                            --><?php /*if (isset($_POST['email'])) {
                                include("scriptConnexion.php");
                            };
                            */?>
                        </p>

                        </form>
                    </div>

                    <div id="register" class="animate form">
                        <form  method="post" autocomplete="on" ><!--action="scriptInscription.php" autocomplete="on">-->
                            <h1> Inscription </h1>
                            <div>

                                <p>
                                    <label for="lastnameignup" class="nom" data-icon="u" > Nom : </label>
                                    <input id="lastnameignup" name="nom" required="required" type="text" placeholder="Nom"/>
                                </p>

                                <p>
                                    <label for="firstnameignup" class="prenom" data-icon="u" > Prénom : </label>
                                    <input id="firstnameignup" name="prenom" required="required" type="text" placeholder="Prénom"/>
                                </p>

                                <p>
                                    <label for="emailignup" class="email" data-icon="e"> Adresse E-Mail : </label>
                                    <input id="emailignup" name="email" required="required" type="text" placeholder="prenom@nom.fr" />
                                </p>

                                <p>
                                    <label for="passwordignup" class="youpasswd" data-icon="p"> Mot de passe : </label>
                                    <input id="passwordignup" name="mdp" required="required" type="password" placeholder="Mot de passe" />
                                </p>

                                <p>
                                    <label for="password2ignup" class="youpasswd2" data-icon="p">Confirmer le mot de passe : </label>
                                    <input id="password2ignup" name="mdp2" required="required" type="password" placeholder="Confirmer le mot de passe" />
                                </p>

                                <p class="signin button">

                                    <input type="submit" href="index.php"/>
<!--                                    --><?php /*if (isset($_POST['email'])) {
                                        include("scriptInscription.php");
                                    };
                                    */?>
                                </p>

                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>


</div>

</body>

</html>