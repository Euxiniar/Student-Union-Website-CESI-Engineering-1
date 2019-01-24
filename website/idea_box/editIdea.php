<html>

<head>

</head>

<body>
<?php
$PAGE = 'editIdea';
include("../common/header.php");
include("../scripts/setConnexionLocalBDD.php");

$evenement = $local_bdd->query('call orleans_bde.sps_evenement('. $_POST['id'].');');
$datasEvenement = $evenement->fetch();
$evenement->closeCursor();

?>
<div class = "IdeaBox p-2 pr-4 mt-4">
    <form class="container-fluid" method="post"  autocomplete="on" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12"> <!--Titre-->
                <t2> Modification d'une idée d'évènement</t2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Photo-->
                <img alt="Photo de couverture de l'évènement" src="<?php echo $datasEvenement['URL_photo'] ?>" width="160" class="max">
            </div> <!--Photo-->
            <div class="col-md-6"> <!--Titre date récurrence-->
                <t3>Edition de l'idée</t3><br/>
                <input type="text"  name="title" placeholder="Titre de l'idée" class ="mb-2" maxlength="50" required="required" value ="<?php echo $datasEvenement['Titre']; ?>" autofocus ><br/>
                <?php $evenement->closeCursor(); ?>
                <t3>Date de l'évènement</t3><br/>
                <input type="date" name="date" class ="mb-2" required="required" value ="<?php echo  $datasEvenement['Date_evenement']; ?>"><br/>
                <t3>Récurrence de l'évènement</t3><br/>
                <select id="selectbasic" name="recurrence" class="form-control mb-2" required="required" value ="<?php echo $local_bdd->query('call orleans_bde.sps_recurrence('.$datasEvenement['Id_reccurrence'].');')->fetch();  ?>"><br/>
                    <option value="4" name="recurrence">Aucune récurrence</option>
                    <option value="1" name="recurrence">1 semaine</option>
                    <option value="2" name="recurrence">1 mois</option>
                    <option value="3" name="recurrence">1 ans</option>
                </select>
            </div> <!--Titre date récurrence-->
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Choisir un fichier-->
                <t3 class ="pl-3 ">Image | max 1 Mo </t3><br/>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" /> <!--Mac 1Mo-->
                <input id="filebutton" name="filebutton" class="input-file pl-3" type="file" required="required" value ="<?php echo $datasEvenement['URL_photo']; ?>" accept="image/png, image/jpeg, image/jpg, image/gif"  >
            </div> <!--Choisir un fichier-->
            <div class="col-md-3"> <!--cout-->
                <t3>Cout prévisionnel </t3>
                <br/>
                <input type="number" name="quantity" placeholder ="0€" value ="<?php echo $datasEvenement['Cout']; ?>" min="0" max="999">
            </div> <!--cout-->
            <div class="col-md-3 m"> <!--adresse-->
                <t3>Adresse de l'évènement</t3>
                <br/>
                <input type="text" id="adr" name="address" placeholder="1 allé du titane" value ="<?php echo $datasEvenement['Lieu']; ?>" maxlength="50">
            </div><!--adresse-->
        </div>
        <div class="row">
            <div class="col-md-12 m-3 "> <!--Description-->
                <t3>Description</t3>
                <br/>
                <textarea class="form-control" id="description" name="description" required="required" maxlength="2000"><?php echo $datasEvenement['Description']; ?></textarea>
            </div> <!--Description-->
        </div>
        <div class="row">
            <div class="col-md-12"> <!--Boutton submit-->
                <div class="submit">
                    <a href="index.php" id="submit" name="submit" class="btn btn-danger m-3" >Annuler</a>
                    <button id="submit" name="submit" class="btn btn-success m-3">Modifier l'idée</button>
                </div>
            </div> <!--Boutton submit-->
        </div>
    </form>
</div>

<?php if(isset($_POST['submit'])) {
    include("../scripts/createEvent.php");
}?>

<?php include("../common/footer.php"); ?>
</body>

</html>