<?php if(!isset($_SESSION))
        session_start();
?>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../assets/css/common.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../assets/css/header.css"> -->
        <?php if(!isset($PAGE)){
            $PAGE="default";
        }?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #211D1D;">
            <a class="navbar-brand" href="../connected/home.php">
                <div class="d-flex flex-wrap align-items-center">
                    <img src="../assets/img/logo.png" alt="Logo" height="42" width="42" class="align-middle mr-1">
                    <div class="align-middle pr-5">
                        <div>Site du BDE</div>
                        <div>Campus d'Orléans</div>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <div class="mr-auto text-white" style="font-size: 40px !important;">
                    <?php
                        if(isset($PAGE)){
                            $url = 'http://localhost:3000/page?name='.urlencode($PAGE);
                            $api_json = @file_get_contents($url);
                            $api_array= json_decode($api_json, true);
                            echo $api_array['name'];
                        }
                    ?>
                </div>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Évènements
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../events_passed/">Évènements passés</a>
                        <a class="dropdown-item" href="../events_to_come/">Évènements à venir</a>
                    </div>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="../idea_box/">Boîte à Idées</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../store/"><i class="fas fa-tshirt pr-1"></i>Boutique</a>
                </li>
                <?php 
                    if(isset($_SESSION['id'])){
                        echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                                .$_SESSION['f_name'].' '.$_SESSION['l_name'].
                            '</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="../scripts/deconnexion.php">Déconnexion</a>
                            </div>
                        </li>';
                    } else {
                        echo '
                            <li class="nav-item">
                                <a class="nav-link" href="../disconnected/connexion.php#tologin">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../disconnected/connexion.php#toregister">Inscription</a>
                            </li>';
                    }
                ?>
                <?php 
                    if($PAGE=="Boutique" || $PAGE=="Panier") {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href=" ../store/cart.php"><i class="fas fa-shopping-cart" style="width: 22px;"></i>Panier</a>
                        </li>
                        ';
                    }
                ?>
                </ul>
            </div>
        </nav>
    </body>
</html>