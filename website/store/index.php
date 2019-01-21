<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="../assets/css/store.css" type="text/css">
        <link rel="stylesheet" href="../assets/js/store.js">
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

            <div id="contenu10">

                <div id="contenu100">
                    <p>je suis le titre de l'article</p>
                    </br>
                </div>

                <div id="contenu101">
                <img
                    src="../assets/img/t-shirt.jpg" 
                    alt="t-shirt gris du bde"
                    height="100%" 
                    width="100%" 
                />
                     </br>
                </div>

                <div id="contenu102">
                         <p>
                        </p>
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="number" name="quant[2]" class="form-control input-number" value="0" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <p></p>
                    </br>
                </div>
                <div id="contenu103">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>

            <div id="contenu20">

                <div id="contenu200">
                    <p>je suis le titre de l'article2</p>
                    </br>
                </div> 

                <div id="contenu201">
                    <img
                        src="../assets/img/t-shirt.jpg" 
                        alt="t-shirt gris du bde"
                        height="100%" 
                        width="100%" 
                    />
                     </br>
                </div>

                <div id="contenu202">
                        <p>
                        </p>
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="number" name="quant[2]" class="form-control input-number" value="0" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <p></p>
                    </br>
                </div>
                <div id="contenu203">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>

            <div id="contenu30">

                <div id="contenu300">
                    <p>je suis le titre de l'article3</p>
                    </br>
                </div>

                <div id="contenu301">
                    <img
                        src="../assets/img/t-shirt.jpg" 
                        alt="t-shirt gris du bde"
                        height="100%" 
                        width="100%" 
                    />
                    </br>
                </div>

                <div id="contenu302">
                         <p>
                        </p>
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="number" name="quant[2]" class="form-control input-number" value="0" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <p></p>
                    </br>
                </div>
                <div id="contenu303">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>

        </div>

        <div id="contenu2">

            <div id="contenu40">

                <div id="contenu400">
                    <p>je suis le titre de l'article4</p>
                    </br>
                </div>

                <div id="contenu401">
                    <img
                        src="../assets/img/t-shirt.jpg" 
                        alt="t-shirt gris du bde"
                        height="100%" 
                        width="100%" 
                    />
                    </br>   
                </div>

                <div id="contenu402">
                <p>
                <p>
                        </p>
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="number" name="quant[2]" class="form-control input-number" value="0" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <p></p>
                    </br>
                </div>
                <div id="contenu403">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>

            <div id="contenu50">
                <div id="contenu500">
                     <p>je suis le titre de l'article5</p>
                    </br>
                </div>
                <div id="contenu501">
                    <img
                        src="../assets/img/t-shirt.jpg" 
                        alt="t-shirt gris du bde"
                        height="100%" 
                        width="100%" 
                    />
                     </br>
                </div>
                <div id="contenu502">
                        <p>
                        </p>
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="number" name="quant[2]" class="form-control input-number" value="0" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <p></p>
                     </br>
                </div>
                <div id="contenu503">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>














    </div>


    <div id="pied_page">Ceci est le pied de page</div>


</body>


</html>

