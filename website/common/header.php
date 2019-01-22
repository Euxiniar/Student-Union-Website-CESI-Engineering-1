<html>
    <head>
        <link rel="stylesheet" href="../assets/vendors/Bootstrap/css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/css/header.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #211D1D;">
            <div class="mr-auto">
                <a href="../disconnected/home.php"><img src="../assets/img/logo.png" alt="Logo" height="42" width="42"></a>
                <a class="navbar-brand align-middle" href="../disconnected/home.php">Site du BDE<br/>Campus d'Orléans</a>
            </div>
            <div class="ml-auto align-middle">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../disconnected/connexion.php#tologin">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../disconnected/connexion.php#toregister">Inscription</a>
                    </li>
                    <?php 
                        if($PAGE=="cart"){
                            echo '
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-shopping-cart" style="width: 22px;"></i>Panier</a>
                            </li>
                            ';
                        }
                    ?>
                </ul>
            </div>
        </nav>
    </body>
</html>