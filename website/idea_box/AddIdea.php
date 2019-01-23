<html>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/idea.css" />
    <link href="../assets/vendors/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/Bootstrap/css/mdb.lite.css" rel="stylesheet">
    <link href="../assets/vendors/Bootstrap/css/mdb.lite.min.css" rel="stylesheet">
    <link href="../assets/vendors/Bootstrap/css/mdb.min.css" rel="stylesheet">
    <link href="../assets/vendors/jquery/jquery-3.3.1.min.js" rel="stylesheet">
    <script src="../assets/vendors/jquery/jquery-3.3.1.min.js"></script>
</head>

<body>
<?php include("../common/header.php"); ?>

<div class = "IdeaBox p-2 pr-4 mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> <!--Titre-->
                <t2> Création d'une idée d'évènement</t2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Photo-->

            </div> <!--Photo-->
            <div class="col-md-6"> <!--Titre date récurrence-->
                <t3>Titre de l'idée</t3><br/>
                <input type="text"  name="textinput" placeholder="Titre de l'idée" class ="mb-2"><br/>
                <t3>Date de l'évènement</t3><br/>
                <input type="date" name="bday" class ="mb-2"><br/>
                <t3>Récurrence de l'évènement</t3><br/>
                <select id="selectbasic" name="selectbasic" class="form-control mb-2"><br/>
                    <option value="1">Aucune récurrence</option>
                    <option value="2">1 semaine</option>
                    <option value="3">1 mois</option>
                </select>
            </div> <!--Titre date récurrence-->
        </div>
        <div class="row">
            <div class="col-md-6"> <!--Choisir un fichier-->
                <br/>
                <input id="filebutton" name="filebutton" class="input-file pl-3" type="file">
            </div> <!--Choisir un fichier-->
            <div class="col-md-3"> <!--cout-->
                <t3>Cout prévisionnel </t3>
                <br/>
                <input type="number" name="quantity" placeholder ="0€" min="0" max="999">
            </div> <!--cout-->
            <div class="col-md-3 m"> <!--adresse-->
                <t3>Adresse de l'évènement</t3>
                <br/>
                <input type="text" id="adr" name="address" placeholder="1 allé du titane">
            </div><!--adresse-->
        </div>
        <div class="row">
            <div class="col-md-12 m-3 "> <!--Description-->
                <t3>Description</t3>
                <br/>
                <textarea class="form-control" id="textarea" name="textarea"></textarea>
            </div> <!--Description-->
        </div>
        <div class="row">
            <div class="col-md-12"> <!--Boutton submit-->
                <div class="submit">
                    <button id="button1id" name="button1id" class="btn btn-success m-3">Créer l'idée</button>
                </div>
            </div> <!--Boutton submit-->
        </div>
    </div>
</div>


<?php include("../common/footer.php"); ?>
</body>

</html>