<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />

        <link rel="stylesheet" href="../assets/css/store.css">

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

         </br>

        <p>Filtre</p>

        </br>

        </br>

        <p id="text_categorie">Catégorie</p>

        <input type="checkbox" name="categorie" id="case" /> <label for="case" >Vetements</label>

        <input type="checkbox" name="categorie" id="case" /> <label for="case" >goodies</label>

        <input type="checkbox" name="categorie" id="case" /> <label for="case" >stickers</label>



        </br>
        </br>
        </br>
        </br>

        <div class="bouton">
            <p>
                <a href="#">Ajouter un produit</a>
            </p>
        </div>



    </div>


    <div id="contenu" >

        <div id="contenu1">
            <p>je suis le titre de l'article</p>
        </br>
            <p>je suis l'image de l'article</p>
        </br>
            <p>je suis la quantite</p>
        </br>
        </div>
        <div id="contenu2">
            <p>je suis le titre de l'article2</p>
        </br>
            <p>je suis l'image de l'articl2</p>
        </br>
            <p>je suis la quantite2</p>
        </br>
        </div>
        <div id="contenu3">
            <p>je suis le titre de l'article3</p>
        </br>
            <p>je suis l'image de l'article3</p>
        </br>
            <p>je suis la quantite3</p>
        </br>
        </div>
    </div>














    </div>


    <div id="pied_page">Ceci est le pied de page</div>


</body>


</html>