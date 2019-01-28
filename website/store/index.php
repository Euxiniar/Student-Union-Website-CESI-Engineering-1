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
    <?php $PAGE="store"; ?>
    <title>Boutique - BDE CESI Orléans</title>
  </head>

  <body>

    <?php include("../common/header.php") ?>


		<div class="grid-container">
  <div class="left-side">
		<div class="main-toolbar">
			<div class="left-item">
<h2> Recherche </h2>
	<div class="container-4">
              <form method="get" action="/search">
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

			<form action="index.php" method="post">
      <select class="custom-select" id="sel1" data-live-search="true" onchange="querySearch()">
			<option class="input-placeholder-select" value="0">Catégorie...</option>
    <?php include("../scripts/setConnexionLocalBDD.php");
            $category = $local_bdd->query('call orleans_bde.spl_list_category()');
            while($datasCategoryItem = $category->fetch()){
                include("./Categorie.php");
            }
            $category->closeCursor();
            ?>
			</select>
</form>

</div>



</div>
	</div>
  <div class="right-side">
	<div id="main-gallery">
          <?php include("../scripts/setConnexionLocalBDD.php");
    $article = $local_bdd->query('call orleans_bde.sps_article()');
    while($datasItemStore = $article->fetch()){
        include("./item-box.php");
    }
	$article->closeCursor(); ?>
				</div>
	</div>
</div>


    <?php include_once("../common/footer.php") ?>


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

      <script>
        $(document).ready(function() {
          $('#sidebarCollapse').on('keyup', function() {
            $('#sidebar').toggleClass('active');
          });
        });

      </script>


      <script>
        function querySearch() {
          var search = document.getElementById('search').value;
          var category = document.getElementById("sel1").value;
          if(search) {
          } else {
            search = "NULL";
          }

          if(category) {
          } else {
            category = "NULL";
          }
          
          $.ajax({
            type: "GET",
            url: "searchJs.php",
            data: {
              searchBarInput: search,
              category: category
            },
            success: function(result) {
              $('#main-gallery').html(result);
            }
          });
        }

      </script>

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
                            $('#contenu').html(response);
                        });
                    });
                }
            });
        }
</script>

  </body>

</html>
