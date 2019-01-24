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
<div class = "IdeaBox p-2 pr-4 mt-4">
    <form class="container-fluid" method="post"  autocomplete="on" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12"> <!--Titre-->
                <t2> Création d'un article</t2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Photo-->

            </div> <!--Photo-->
            <div class="col-md-6"> <!--Nom Article-->
                <t3>Nom de l'article</t3><br/>
                <input type="text"  name="titre" placeholder="Nom de l'article" class ="mb-2" maxlength="50" required="required" autofocus ><br/>
                <br/>
                <t3>Description de l'article</t3><br/>
                <textarea class="form-control" id="description" name="description" required="required" maxlength="2000"></textarea>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Choisir un fichier-->
                <t3 class ="pl-3 ">Image | max 1 Mo </t3><br/>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" accept="image/png, image/jpeg, image/jpg" /> <!--Mac 1Mo-->
                <input id="filebutton" name="filebutton" class="input-file pl-3" type="file" required="required" accept="image/png, image/jpeg, image/jpg" >
            </div> <!--Choisir un fichier-->
            <div class="col-md-3"> <!--cout-->
                <t3>Cout de l'article </t3>
                <br/>
                <input type="number" name="quantity" placeholder ="0€" min="0" max="999">
            </div> <!--cout-->
        </div>
        <div class="row">
            <div class="col-md-12 m-3 "> 
            <div class="submit">
                    <a href="../store/index.php" id="submit" name="submit" class="btn btn-danger m-3" >Annuler</a>
                    <button id="submit" name="submit" class="btn btn-success m-3">Ajouter</button>
                </div>
            </div> 
        </div>
    </form>
</div>
<?php if(isset($_POST['submit'])) {
    include("../scripts/createArticle.php");
}?>

<?php include("../common/footer.php"); ?>
</body>
</html>