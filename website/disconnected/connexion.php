<!DOCTYPE html>
<!--####################################
 Auteur : Anatole COUASNON
 Date : 2019
 Contexte : PROJET WEB SITE BDE
 #######################################-->

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../assets/css/styleConnexion.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/animate-custom.css" />

    <title>Connexion - Site BDE - Campus Orleans</title>
</head>

<body>
<?php $PAGE = "connexion_form" ?>
<?php include("../common/header.php"); ?>

<!-- Le corps -->
<div id="corps" class ="mb-5">
    <div class="container">
        <section>
            <div id="container" >
                <a class="hiddenanchor" id="tologin"></a>
                <a class="hiddenanchor" id="toregister"></a>

                <div id="wrapper" class ="p-5">
                    <div id="login" class="">
                        <form method="post"  autocomplete="on">
                        <h1>Connexion</h1>
                            <p><span class="glyphicon glyphicon-search" aria-hidden="true"></span></p>
                        <p>

                            <label for="username" class="uname" data-icon="u"> Adresse E-mail : </label>
                            <input id="username" name="emailsignup" required="required" type="text" placeholder="Adresse E-mail"/>
                        </p>

                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Mot de passe : </label>
                            <input id="password" name="mdpsignup" required="required" type="password" placeholder="Mot de passe" />
                        </p>

                        <p class="login button">
                            <input id = "formLogin" type="submit" value="Connexion" />
                            <?php if (isset($_POST['emailsignup'])) {
                                include("../scripts/scriptConnexion.php");
                            };
                            ?>
                        </p>

                        </form>
                    </div>

                    <div id="register" class="animate form ">
                        <form  method="post" autocomplete="on" ><!--action="scriptInscription.php" autocomplete="on">-->
                            <h1> Inscription </h1>
                            <div>

                                <p>
                                    <label data-icon="e"> Adresse E-Mail : </label>
                                    <input name="email" required="required" type="text" placeholder="prenom@nom.fr" />
                                </p>

                                <p>
                                    <label  data-icon="p"> Mot de passe : </label>
                                    <input name="mdp" required="required" type="password" placeholder="Mot de passe" />
                                </p>

                                <p>
                                    <label data-icon="p">Confirmer le mot de passe : </label>
                                    <input name="mdp2" required="required" type="password" placeholder="Confirmer le mot de passe" />
                                </p>

                                <p class="signin button">

                                    <input type="submit" href="index.php"/>
                                    <?php if (isset($_POST['email'])) {
                                        include("../scripts/scriptInscription.php");
                                    };
                                    ?>
                                </p>

                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
<?php include("../common/footer.php"); ?>
</body>

</html>