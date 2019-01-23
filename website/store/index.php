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
                        <label class="control control-radio">
                                stickers
                                <input type="checkbox" name="Filtre[]" value="stickers" >
                                <div class="control_indicator"></div>
                        </label>
                        <label class="control control-radio">
                                goodies
                                <input type="checkbox" name="Filtre[]" value="goodies">
                                <div class="control_indicator"></div>
                        </label>
                        <label class="control control-radio">
                                Vetement homme 
                                <input type="checkbox" name="Filtre[]" value="VetementH" >
                                <div class="control_indicator"></div>
                        </label>
                        <label class="control control-radio">
                                Vetement femme
                                <input type="checkbox" name="Filtre[]" value="VetementF">
                                <div class="control_indicator"></div>
                        </label>
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
        <li><button class="bouton2" >

        <a id="a" href="addproduit.php" >
            Ajouter un produit
        </a>
        </button></li>


    </div>

    <div id="contenu" >

        <div id="contenu1">

            <div class="contenu10">

                <div class="contenu100">
                    <p>je suis le titre de l'article</p>
                    </br>
                </div>

                <div class="contenu101">
                <img
                    src="../assets/img/t-shirt.jpg" 
                    alt="t-shirt gris du bde"
                    height="100%" 
                    width="100%" 
                />
                     </br>
                </div>

                <div class="contenu102">
                         <p>
                        </p>
                        <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[5]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[5]" class="form-control input-number" value="0" min="0" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[5]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
                        <p></p>
                    </br>
                </div>
                <div class="contenu103">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>

            <div class="contenu10">

                <div class="contenu100">
                    <p>je suis le titre de l'article2</p>
                    </br>
                </div> 

                <div class="contenu101">
                    <img
                        src="../assets/img/t-shirt.jpg" 
                        alt="t-shirt gris du bde"
                        height="100%" 
                        width="100%" 
                    />
                     </br>
                </div>

                <div class="contenu102">
                        <p>
                        </p>
                        <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[4]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[4]" class="form-control input-number" value="0" min="0" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[4]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
                        <p></p>
                    </br>
                </div>
                <div class="contenu103">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>

            <div class="contenu10">

                <div class="contenu100">
                    <p>je suis le titre de l'article3</p>
                    </br>
                </div>

                <div class="contenu101">
                    <img
                        src="../assets/img/t-shirt.jpg" 
                        alt="t-shirt gris du bde"
                        height="100%" 
                        width="100%" 
                    />
                    </br>
                </div>

                <div class="contenu102">
                         <p>
                        </p>
                        <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[3]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[3]" class="form-control input-number" value="0" min="0" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[3]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
                        <p></p>
                    </br>
                </div>
                <div class="contenu103">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>

        </div>

        <div id="contenu2">

            <div class="contenu20">

                <div class="contenu100">
                    <p>je suis le titre de l'article4</p>
                    </br>
                </div>

                <div class="contenu101">
                    <img
                        src="../assets/img/t-shirt.jpg" 
                        alt="t-shirt gris du bde"
                        height="100%" 
                        width="100%" 
                    />
                    </br>   
                </div>

                <div class="contenu102">
                <p>
                <p>
                        </p>
                        <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[1]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[1]" class="form-control input-number" value="0" min="0" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
                        <p></p>
                    </br>
                </div>
                <div class="contenu103">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>

            <div class="contenu20">
                <div class="contenu100">
                     <p>je suis le titre de l'article5</p>
                    </br>
                </div>
                <div class="contenu101">
                    <img
                        src="../assets/img/t-shirt.jpg" 
                        alt="t-shirt gris du bde"
                        height="100%" 
                        width="100%" 
                    />
                     </br>
                </div>
                <div class="contenu102">
                        <p>
                        </p>
                        <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[2]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[2]" class="form-control input-number" value="0" min="0" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[2]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
                        <p></p>
                     </br>
                </div>
                <div class="contenu103">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>
            </div>
        </div>
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

