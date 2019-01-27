<?php
    include("../common/header.php");
?>

<form method="post" autocomplete="on" enctype="multipart/form-data">
    <div class="col-md-6"> <!--Choisir un fichier-->
        <h3 class ="pl-3 ">Image | max 50 Mo </h3><br/>
        <input type="hidden" name="" value="52428800" /> <!--Max 50Mo-->
        <input id="filebutton" name="filebutton" class="input-file pl-3" type="file" required="required" accept="image/png, image/jpeg, image/jpg, image/gif"/>
        <button type="submit" name="validate" class="btn btn-success m-3">Envoyer</button>
        <a href="../events_passed/index_photos.php" name="cancel" class="btn btn-danger m-3">Anuler</a>
    </div>
</form>

<?php
    if(isset($_POST['validate'])) {
        include("../scripts/createPhoto.php");
    }
    include("../common/footer.php");
?>