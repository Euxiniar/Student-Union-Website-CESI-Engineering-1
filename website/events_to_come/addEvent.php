<html>

<body class="common-background-blue">
<?php
$PAGE = 'Ajouter une idée';
include("../common/header.php"); ?>


<div class = "IdeaBox p-2 pr-4 mt-4">
    <form class="container-fluid" method="post"  autocomplete="on" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12"> <!--Titre-->
                <span class="common-t2"> Création d'un évènement</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Photo-->

            </div> <!--Photo-->
            <div class="col-md-6"> <!--Titre date récurrence-->
                <span class="common-t3">Titre de l'évènement</span><br/>
                <input type="text"  name="title" placeholder="Titre de l'évènement" class ="mb-2" maxlength="50" required="required" autofocus ><br/>
                <t3>Date de l'évènement</t3><br/>
                <input type="date" name="date" class ="mb-2" required="required"><br/>
                <t3>Récurrence de l'évènement</t3><br/>
                <select id="selectbasic" name="recurrence" class="form-control mb-2" required="required"><br/>
                    <option value="4" name="recurrence">Aucune récurrence</option>
                    <option value="1" name="recurrence">1 semaine</option>
                    <option value="2" name="recurrence">1 mois</option>
                    <option value="3" name="recurrence">1 ans</option>
                </select>
            </div> <!--Titre date récurrence-->
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Choisir un fichier-->
                <t3 class ="pl-3 ">Image | max 50 Mo </t3><br/>
                <input type="hidden" name="" value="52428800" /> <!--Max 50Mo-->
                <input id="filebutton" name="filebutton" class="input-file pl-3" type="file" required="required" accept="image/png, image/jpeg, image/jpg, image/gif"  >
            </div> <!--Choisir un fichier-->
            <div class="col-md-3"> <!--cout-->
                <t3>Cout par personne </t3>
                <br/>
                <input type="number" name="quantity" placeholder ="0€" min="0" max="999">
            </div> <!--cout-->
            <div class="col-md-3 m"> <!--adresse-->
                <t3>Adresse de l'évènement</t3>
                <br/>
                <input type="text" id="adr" name="address" placeholder="1 allé du titane" maxlength="50">
            </div><!--adresse-->
        </div>
        <div class="row">
            <div class="col-md-12 m-3 "> <!--Description-->
                <t3>Description</t3>
                <br/>
                <textarea class="form-control" id="description" name="description" required="required" maxlength="2000"></textarea>
            </div> <!--Description-->
        </div>
        <div class="row">
            <div class="col-md-12"> <!--Boutton submit-->
                <div class="submit">
                    <input type="hidden" name="id_status_date" value="1"/>
                    <a href="../idea_box/AccueilBoxIdea.php" id="submit" name="submit" class="btn btn-danger m-3" >Annuler</a>
                    <button id="submit" name="submit" class="btn btn-success m-3">Créer l'évènement</button>
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