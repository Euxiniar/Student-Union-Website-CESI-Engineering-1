<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Panier - Boutique - BDE CESI Orléans</title>



    <!-- TODO : Unify the assets source for the whole BDE project. -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../assets/css/reset.css" rel="stylesheet">
    <?php $PAGE="cart" ; ?>

</head>

<body>
    <!-- Add the header -->
    <?php include( "../common/header.php") ?>

<?php

if (isset($_SESSION['id']))
{
    include("../scripts/setConnexionLocalBDD.php");
    $itemsInOrder = $local_bdd->query("call orleans_bde.spl_order_by_user_and_order_status({$_SESSION['id']});");
    if (!empty($itemsInOrder)) { 
        echo "<h1>Votre panier est vide.</h1>";
        echo "<p>Ajoutez des produits !</p>";
    } else {
       while($datasEvent = $itemsInOrder->fetch()){
           include_once("./cart-top.php");
           include("./cart-item.php");
           include_once("./cart-total.php");
       }
   
       $itemsInOrder->closeCursor();
    }
                       
} else {
    echo "<h1> Vous devez être connectés. </h1>";
}
?>



    <style>
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            vertical-align: middle;
        }
        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }
            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }
            .actions .btn-info {
                float: left;
            }
            .actions .btn-danger {
                float: right;
            }
            table#cart thead {
                display: none;
            }
            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }
            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }
            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }
            table#cart tfoot td {
                display: block;
            }
            table#cart tfoot td .btn {
                display: block;
            }
        }
    </style>





    <!-- Add the footer -->
    <?php include( "../common/footer.php") ?>
</body>

</html>