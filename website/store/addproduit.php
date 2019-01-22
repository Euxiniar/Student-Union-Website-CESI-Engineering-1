<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="../assets/css/addproduit.css">
  <?php $PAGE="cart"; ?>
</head>
<body>
<?php include("../common/header.php") ?>
<div class="grid-container">




  <div class="Photo_couverture">
  <input id="filebutton" name="filebutton" class="input-file" type="file">


  </div>




  <div class="Nom_produit">

        <TEXTAREA rows=2 COLS=100> 
        Nom du produit
        </TEXTAREA>


  </div>




  <div class="Description_produit">

        <TEXTAREA rows=4 COLS=100> 
        Description du produit 
        </TEXTAREA>

  </div>




  <div class="Prix_produit">

        <TEXTAREA rows=1 COLS=40> 
        Prix €
        </TEXTAREA> 

  </div>





  <div class="Annuler_produit" id="bouton_produit" >

        <button type="button" class="btn btn-danger">Danger</button>

  </div>



  <div class="Ajouter_produit" id="bouton_produit">

        <button type="button" class="btn btn-success">Success</button>

  </div>
</div>
</body>
</html>