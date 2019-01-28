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
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #211D1D;">
            <div class="mr-auto row">
                <a href="
                    <?php 
                        if(isset($_SESSION['id'])){
                            echo '../connected/home.php';
                        }
                        else{ 
                            echo '../disconnected/home.php'; 
                        }
                        ?>" class="col-9">
                    <img src="../assets/img/logo.png" alt="Logo" height="42" width="42">
                    <div class="navbar-brand align-middle p-0">Site du BDE<br/>Campus d'Orléans</div>
                    
                </a>
                <ul class="navbar-nav col-3 align-middle">
                    <li class="nav-item">
                        <a class="navbar-brand text-white p0 m0"> <h2>
                            <?php
/*                            if(isset($PAGE)){
                                $url = 'http://localhost:3000/page?name='.urlencode($PAGE);
                                $api_json = file_get_contents($url);
                                $api_array= json_decode($api_json, true);
                                echo $api_array['name'];
                            }*/
                            ?></h2></a>
                    </li>
                </ul>
            </div>
            <div class="mr-auto align-middle">
                
            </div>
            <div class="ml-auto align-middle">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Évènements
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../events_passed/">Évènements passé</a>
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
                        if($PAGE=="store" || $PAGE=="cart") {
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