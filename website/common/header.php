<html>
    <head>
    <link rel="stylesheet" href="../assets/css/header.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #211D1D;">
    <div class="mr-auto order-0">
        <a class="col-md-6 align-middle" href="#"><img src="../assets/img/logo.png" alt="Logo" height="42" width="42"></a>
        <a class="col-md-6 navbar-brand align-middle" href="#">Site du BDE<br/>Campus d'Orléans</a>
    </div>

    <?php 
    switch($PAGE) {
        case  "home":
            include("header_home.php");
            break;
        case "cart":
            include("header_cart.php");
            break;
        default:
            include("header_home.php");
            break;
    } ?>

</nav>
    </body>
</html>