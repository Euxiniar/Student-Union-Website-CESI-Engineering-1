<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <?php $PAGE = "Boutique"; ?>
    <title>Boutique - BDE CESI Orléans</title>


    <link href="bootstrap-slider.css" rel="stylesheet">
<script src="bootstrap-slider.js"></script>
  </head>

  <body>

    <?php include ("../common/header.php") ?>


		<div class="grid-container">
  <div class="left-side">
		<div class="main-toolbar">
			<div class="left-item">
<h2> Recherche </h2>
	<div class="container-4">
              <form method="get" action="">
                <input type="search" id="search" placeholder="Rechercher..." onkeyup="querySearch1()" />
                <button class="icon">
                  <i class="fa fa-search">
                  </i>
								</button>
              </form>
						</div>

</div>

<div class="line"></div>


<div class="left-item">
	<h2> Catégorie </h2>

			<form action="" method="post">
      <select class="custom-select" id="sel1" data-live-search="true" onchange="querySearch1()">
			<option class="input-placeholder-select" value="0">Catégorie...</option>
    <?php include ("../scripts/setConnexionLocalBDD.php");
$category = $local_bdd->query('call orleans_bde.spl_list_category()');
while ($datasCategoryItem = $category->fetch())
{
    include ("./Categorie.php");
}
$category->closeCursor();
?>
			</select>
</form>

</div>

<div class="line"></div>

<div class="left-item">
<h2> Ordre Prix </h2>
<form action="" method="post">
      <select class="custom-select" id="ordre1" data-live-search="true" onchange="querySearch2()">
			<option class="input-placeholder-select" value="0">Trier par...</option>
      <option class="input-placeholder-select" value="1">Ordre croissant</option>
      <option class="input-placeholder-select" value="2">Ordre décroissant</option>
      </select>
      </form>


</div>

<div class="line"></div>


<?php
if (isset($_SESSION['id']))
{
    if ($_SESSION['status'] == "Membre BDE")
    { ?>
<div class="left-item">
                              <form action="addProduit.php" method="post">
<button class="bouton2">
<span>Ajouter un produit</span>
</button>
</form>
</div>
<div class="line"></div>

<div class="left-item">
<form action="addCategory.php" method="post">
<button class="bouton2">
<span>Ajouter une catégorie</span>
</button>
</form>
</div>
                            <?php
    }
} ?>



</div>
	</div>
  <div class="right-side">
	<div id="main-gallery">
  <?php

    $article = $local_bdd->query("call orleans_bde.sps_article();");
    /* Check if the response from database is empty */
    if ($article->rowCount() == 0) { 
        /* It's empty, so we tell the user to add a product to his cart */
        echo "<h2>Aucun résultat ne correspond à votre recherche.</h2>";
    } else {
        /* It's not empty, we display the formatted results */
            $counter = 0;
        while($datasItemStore = $article->fetch()){
            $counter++;
            include("./item-box.php");
        }
        $article->closeCursor();
    }    

    $article->closeCursor();
?>
				</div>
	</div>
</div>


    <?php include_once ("../common/footer.php") ?>



<script>
        function querySearch1() {
          var search = document.getElementById('search').value;
          var category = document.getElementById("sel1").value;

          

          if(category) {
          } else {
            category = "NULL";
          } 

          $.ajax({
            type: "GET",
            url: "inserter1.php",
            data: {
              search: search,
              category: category
            },
            success: function(result) {
              $('#main-gallery').html(result);
            }
          });
        }

      </script>

<script>
        function querySearch2() {
          var ordre = document.getElementById("ordre1").value;
    

          
         

          $.ajax({
            type: "GET",
            url: "inserter2.php",
            data: {
              ordre: ordre
            },
            success: function(result) {
              $('#main-gallery').html(result);
            }
          });
        }

      </script>




    </div>


    <script type="text/javascript" src="../assets/js/store.js"> </script>

    <script>
    function processRemoveArticle(Id_Article) {
            $.ajax({
                type: "POST",
                url: "removeArticle.php",
                data: {
                    Id_Article: Id_Article
                },
                success: function(result) {
                    $(document).ready(function() {
                        $.get('refreshArticle.php', function(response) {
                            $('#main-gallery').html(response);
                            
                        });
                    });
                }
            });
        }
</script>
<script>
function addToCart(Id_Article) {

var id = Id_Article;

var quantity = document.getElementsByName(id)[0].value;
            $.ajax({
                type: "POST",
                url: "addToCart.php",
                data: {
                    Id_Article: id,
                    Quantity: quantity
                },
                success: function(result) {
                   alert(result);
                   
                }
            });
        }
</script>

  </body>

</html>
