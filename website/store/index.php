<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <title>Mon super site</title>
        <?php $PAGE="cart"; ?>
    </head>
 
 <body>
    <?php include("../common/header.php") ?>


    <div id="menu">Menu
        <div class="topnav">

            <div class="search-container">

                <form action="/action_page.php">

                    <input type="text" placeholder="Search.." name="search">

                    <button type="submit">Submit</button>

                </form>

            </div>

        </div>

        </br>
        <p id="p">------------------------------------</p>
         </br>
        <div id="text_filtre">
        <p>Filtre</p>
        </div>

        </br>

        </br>
      


 
  <p id="text_categorie">Catégorie</p>
            <form action="index.php" method="post">
                    <div class="control-group">
                    <?php include("../scripts/setConnexionLocalBDD.php");
                            $category = $local_bdd->query('call orleans_bde.spl_list_category()');
                            while($datasCategoryItem = $category->fetch()){
                                include("./Categorie.php");
                            }
                            $category->closeCursor();
                            ?>
                    </div>
                        </br>
                        </br>
                    <div>
                            <button type="submit" class="bouton2">Filtrer</button>
                    </div>
            </form>


                
        </br>
        </br>
        <p id="p">------------------------------------</p>
        </br>
        </br>
        <button class="bouton2" >

        <a id="a" href="addproduit.php" >
            Ajouter un produit
        </a>
        </button>


    </div>
 
    <div id="contenu" >
    <?php include("../scripts/setConnexionLocalBDD.php");
    $campus = $local_bdd->query('call orleans_bde.sps_article()');
    while($datasItemStore = $campus->fetch()){
        include("./item-box.php");
    }

    $campus->closeCursor();
 
 ?>
        

    
    </div>














    </div>
    <?php include("../common/footer.php") ?>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../assets/css/store.css" type="text/css">
    <script type="text/javascript" src="../assets/js/store.js"> </script>
    <script src="js/jquery.js"></script>

</body>


</html>

