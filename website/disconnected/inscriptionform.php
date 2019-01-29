<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../assets/css/style (anatole - nomAChanger).css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/styleConnexion.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/animate-custom.css" />
    <title>Inscription - Site BDE - Campus Orleans</title>
</head>

<body>
<?php $PAGE = "Inscription" ?>

<!-- Le corps -->
<div id="corps">

    <!-- Le menu -->
    <?php /*include("../common/header.php"); */?>

    <div class="container">
        <section>
            <div id="container" >
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <a class="hiddenanchor" id="toregister"></a>

                <div id="wrapper">
                    <div id="login" class="animate form">
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

</body>

</html>