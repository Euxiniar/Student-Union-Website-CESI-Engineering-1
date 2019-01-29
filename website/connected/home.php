<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendors/Bootstrap/css/bootstrap.min.css"> -->

    <title>BDE CESI Exia</title>
    <?php $PAGE = "Accueil"; ?>
</head>

<body>
<link rel="stylesheet" href="../assets/css/home.css">
<?php include("../common/header.php") ?>

<div class="common-PaddingBody">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">Bien<wbr/>venue sur le site du BDE </h1>
                <?php if(isset($_SESSION['id'])) {?>
                    <h1 class="display-3 text-white text-center"><?php echo $_SESSION['f_name']?> <?php echo $_SESSION['l_name'] ?></h1>
                <?php }else{ ?>
                    <div class="row">
                        <div class="col-md-12 text-center py-auto p-3">
                            <a class="btn btn-primary " href="../disconnected/connexion.php#tologin" >Connexion</a>
                            <a class="btn btn-primary" href="../disconnected/connexion.php#toregister">Inscription</a>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>

<?php include("../common/footer.php") ?>

</body>
</html>
