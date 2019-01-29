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
  <button id="bouton_sidebar" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		<div class="main-toolbar">
			<div class="left-item">
<h2> Recherche </h2>
	<div class="container-4">
              <form method="get" action="">
                <input type="search" id="search" placeholder="Rechercher..." onkeyup="querySearch()" />
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
      <select class="custom-select" id="sel1" data-live-search="true" onchange="querySearch()">
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


</div>

<div class="line"></div>
</div>

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
 <?php include ("./inserter.php") ?>
				</div>
	</div>
</div>


    <?php include_once ("../common/footer.php") ?>


      <script>
        function querySearch() {
          var search = document.getElementById('search').value;
          var category = document.getElementById("sel1").value;


          if(search || search === "") {
          } else {
            search = "NULL";
          }

          if(category || category === "") {
          } else {
            category = "0";
          }
          
          $.ajax({
            type: "GET",
            url: "inserter.php",
            data: {
              searchBarInput: search,
              category: category,
              priceLow: priceLow,
              priceHigh: priceHigh
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
