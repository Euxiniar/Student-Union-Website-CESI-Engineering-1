<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>		
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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