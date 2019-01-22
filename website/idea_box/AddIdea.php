<html>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/idea.css" />
</head>

<body>
<div class = "IdeaBox">
    <t2> Création d'une idée d'évènement</t2>
    <form class="grid-container">
        <div class="Titre">
            <t3>Titre de l'idée</t3>
            <br/>
            <input type="text"  name="textinput" placeholder="Titre de l'idée">
        </div>
        <div class="date">
            <t3>Date de l'évènement</t3>
            <br/>
            <input type="date" name="bday">
        </div>
        <div class="recurrence">
            <t3>Récurrence de l'évènement</t3>
            <br/>
            <select id="selectbasic" name="selectbasic" class="form-control">
                <option value="1">Aucune récurrence</option>
                <option value="2">1 semaine</option>
                <option value="3">1 mois</option>
            </select>
        </div>
        <div class="cout">
            <t3>Cout prévisionnel </t3>
            <br/>
            <input type="number" name="quantity" min="0" max="999">
        </div>
        <div class="lieu">
            <t3>Adresse de l'évènement</t3>
            <br/>
            <input type="text" id="adr" name="address" placeholder="1 allé du titane">
        </div>
        <div class="Photo"></div>
        <div class="Description">
            <t3>Description</t3>
            <br/>
            <textarea class="form-control" id="textarea" name="textarea"></textarea>
        </div>
        <div class="selectFolder">
            <br/>
            <input id="filebutton" name="filebutton" class="input-file" type="file">
        </div>
        <div class="submit">
            <button id="button1id" name="button1id" class="btn btn-success">Créer l'idée</button>
        </div>
    </form>
</div>

</body>

</html>