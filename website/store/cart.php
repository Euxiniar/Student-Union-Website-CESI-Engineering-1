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

    <?php $PAGE="cart"; ?>

  </head>

  <body>
        <!-- Add the header -->
        <?php include("../common/header.php") ?>

        <h2 id="cart_title">Récapitulatif de commande</h2>





<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th class="text-center">Prix Unitaire</th>
                        <th class="text-center">Prix Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Produit 1</a></h4>
                                <span>Livraison au BDE uniquement !</span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center">1.00€</td>
                        <td class="col-sm-1 col-md-1 text-center">1.00€</td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Supprimer
                        </button></td>
                    </tr>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Produit 1</a></h4>
                                <span class="">Livraison au BDE uniquement !</span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center">1.00€</td>
                        <td class="col-sm-1 col-md-1 text-center">1.00€</td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Supprimer
                        </button></td>
                    </tr>
                    <hr>
                    <tr>
                        <!-- Required to align to right -->
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <!-- -------------------------- -->
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continuer les achats
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">Commander<span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>













        <!-- Add the footer -->
  <?php include("../common/footer.php") ?>
  </body>

</html>