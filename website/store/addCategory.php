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
                <t2> Création d'une Categorie</t2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Photo-->

            </div> <!--Photo-->
            <div class="col-md-6"> <!--Nom Article-->
                <t3>Nom de la Categorie </t3><br/>
                <input type="text"  name="category" placeholder="Nom de la categorie" class ="mb-2" maxlength="50" required="required" autofocus ><br/>
            </div>
      </div>
        <div class="row">
            <div class="col-md-6"> <!--Choisir un fichier-->
            </div> <!--Choisir un fichier-->
            <div class="col-md-3"> <!--cout-->
            </div>
                <div class="col-md-3 m"> <!--adresse-->
                
             </div>
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
        </div>
    </form>
</div>
<?php if(isset($_POST['submit'])) {
    include("../scripts/createCategory.php");
}?>

<?php include("../common/footer.php"); ?>
</body>
</html>