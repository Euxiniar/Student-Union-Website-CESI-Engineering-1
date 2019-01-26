<!doctype html>
<html >
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="../assets/css/addproduit.css">
</head>
<body>

<?php
$PAGE = 'CART';
include("../common/header.php");
include("../scripts/setConnexionLocalBDD.php");

if (isset($_POST['id'])) {
    $article = $local_bdd->query('call orleans_bde.sps_edit_article('. $_POST['id'].');');
    $datasItemStore = $article->fetch();
    $article->closeCursor();


    ?>




<div class = "IdeaBox p-2 pr-4 mt-4">
    <form class="container-fluid" method="post"  autocomplete="on" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12"> <!--Titre-->
                <t2> Modification d'un article</t2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Photo-->
            <img alt="Photo de l'article" src="<?php echo $datasItemStore['Image'] ?>"  class="ml-3 common-couverture">
            </div> <!--Photo-->
            <div class="col-md-6"> <!--Nom Article-->
                <t3>Nom de l'article</t3><br/>
                <input type="text"  name="titre" placeholder="Nom de l'article" class ="mb-2" maxlength="50" required="required" value ="<?php echo  $datasItemStore['Titre']; ?>" ><br/>
                <t3>Cout de l'article </t3>
                <br/>
                <input type="number" name="cout" value ="<?php echo $datasItemStore['Cout']; ?>" placeholder ="0€" min="0" max="999">
                <input type="hidden" name="Id_article" value="<?php echo $datasItemStore['Id_article'] ?>"/>
            </div>
      </div>
        <div class="row">
            <div class="col-md-6"> <!--Choisir un fichier-->
                <t3 class ="pl-3 ">Image | max 1 Mo </t3><br/>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" accept="image/png, image/jpeg, image/jpg" /> <!--Mac 1Mo-->
                <input id="filebutton" name="filebutton" class="input-file pl-3" type="file"  accept="image/png, image/jpeg, image/jpg" >
            </div> <!--Choisir un fichier-->
            <div class="col-md-3"> <!--cout-->
            <t3>stock </t3>
                <br/>
                <input type="number" name="stock" placeholder ="0" value ="<?php echo $datasItemStore['Stock']; ?>" min="0" max="999">
            </div>
                <div class="col-md-3 m"> <!--adresse-->
                <t3>Categorie de l'article </t3><br/>
                <select id="selectbasic" name="category" class="form-control mb-2" required="required" value ="<?php echo $datasItemStore['Id_categorie']; ?>"><br/>
                    <option value="1" name="category">Vetement</option>
                    <option value="2" name="category">Bracelet</option>
                    <option value="3" name="category">Stylo</option>
                    <option value="4" name="category">Mug</option>
                    <option value="5" name="category">Gobelet</option>
                    <option value="6" name="category">Feutre</option>
                    <option value="7" name="category">Lunettes</option>
                    <option value="8" name="category">Collier</option>
                    <option value="9" name="category">Portes-clés</option>
                    <option value="10" name="category">Clé USB</option>
                </select>
             </div>
            </div> <!--cout-->
        </div>
        <div class="row">
            <div class="col-md-12 m-3 "> 
            <t3>Description de l'article</t3><br/>
                <textarea class="form-control" id="description" name="description" required="required" maxlength="1000"><?php echo $datasItemStore['Description']; ?></textarea>
            </div> 
            <div class="submit">
                    <a href="../store/index.php" id="submit" name="submit" class="btn btn-danger m-3" >Annuler</a>
                    <button id="submit" name="submit" class="btn btn-success m-3">Modifier</button>
                </div>
            </div> 
        </div>
    </form>
</div>

<?php
}else {
        if(isset($_POST['submit'])) {
            include("../scripts/editproduit.php");
        }
        echo '<meta http-equiv="refresh" content="0; URL=../store/index.php">';
    }
?>
</body>

</html>