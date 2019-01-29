<html>

<head>

</head>

<body class="common-background-blue">
<?php
$PAGE = 'Ajouter une idée';
include("../common/header.php");
include("../scripts/setConnexionLocalBDD.php");
if(!isset($_SESSION)){
session_start();
}
if (isset($_POST['id'])){
$_SESSION['id_event'] = $_POST['id'];
}

if (isset($_SESSION['id_event'])) {
    $evenement = $local_bdd->query('call orleans_bde.sps_evenement(' . $_SESSION['id_event'] . ');');
    $datasEvenement = $evenement->fetch();
    $evenement->closeCursor(); ?>

    <div class = "IdeaBox p-2 pr-4 mt-4">
        <form class="container-fluid" method="post"  autocomplete="on" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12"> <!--Titre-->
                    <span class="common-t2"> Création d'une idée d'évènement</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"> <!--Photo-->
                    <img alt="Photo de couverture de l'évènement" src="<?php echo $datasEvenement['URL_photo'] ?>"  class="ml-3 common-couverture">
                </div> <!--Photo-->
                <div class="col-md-4"> <!--Titre date récurrence-->
                    <span class="common-t3">Titre de l'idée</span><br/>
                    <input class="form-control" type="text" name="title" placeholder="Titre de l'idée" value ="<?php echo $datasEvenement['Titre']; ?>" required autofocus>
                    <span class="common-t3">Récurrence de l'évènement</span><br/>
                    <select id="selectbasic" name="recurrence" required class="form-control mb-2"><br/>
                        <option value="4" name="recurrence">Aucune récurrence</option>
                        <option value="1" name="recurrence">1 semaine</option>
                        <option value="2" name="recurrence">1 mois</option>
                        <option value="3" name="recurrence">1 ans</option>
                    </select>
                </div> <!--Titre date récurrence-->
                <div class="col-md-4">
                    <span class="common-t3">Heure de l'évènement</span><br/>
                    <input class="form-control" type="time" value="12:00:00" name="time">
                    <span class="common-t3 mt-2" >Date de l'évènement</span><br/>
                    <input class="form-control" type="date" name="date" value ="<?php echo  $datasEvenement['Date_evenement']; ?>" id="example-date-input" required><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"> <!--Choisir un fichier-->
                    <span class ="pl-3 common-t3">Image | max 50 Mo </span><br/>
                    <input type="hidden" name="" value="52428800" /> <!--Max 50Mo-->
                    <input id="filebutton" name="filebutton" class="input-file pl-3" type="file" accept="image/png, image/jpeg, image/jpg, image/gif"  >
                </div> <!--Choisir un fichier-->
                <div class="col-md-4"> <!--cout-->
                    <span class="common-t3">Cout prévisionnel </span>
                    <br/>
                    <input class="form-control" type="number" value ="<?php echo $datasEvenement['Cout']; ?>" name="quantity" placeholder ="0€" min="0" max="999">
                </div> <!--cout-->
                <div class="col-md-4 m"> <!--adresse-->
                    <span class="common-t3">Adresse de l'évènement</span>
                    <br/>
                    <input type = "text" class="form-control" id="adr" name="address" value ="<?php echo $datasEvenement['Lieu']; ?>" maxlength="50">
                </div><!--adresse-->
            </div>
            <div class="row">
                <div class="col-md-12 m-3 "> <!--Description-->
                    <span class="common-t3">Description</span>
                    <br/>
                    <textarea class="form-control" id="description" name="description" required="required" maxlength="2000"><?php echo $datasEvenement['Description']; ?></textarea>
                </div> <!--Description-->
            </div>
            <div class="row">
                <div class="col-md-12"> <!--Boutton submit-->
                    <div class="submit">
                        <input type="hidden" name="id_status_date" value="1"/>
                        <a href="../idea_box/AccueilBoxIdea.php" id="submit" name="submit" class="btn btn-danger m-3" >Annuler</a>
                        <button id="submit" name="submit" class="btn btn-success m-3">Modifier l'évènement</button>
                    </div>
                </div> <!--Boutton submit-->
            </div>
        </form>
    </div>
<?php
}?>

<?php if(isset($_POST['submit'])) {
    include("../scripts/editEvent.php");
}?>

<?php include("../common/footer.php"); ?>
</body>

</html>













