<?php session_start(); ?>
<?php require_once "header.php" ?>
<body>
    <div class="wrapper">
        <div class="create-formulier">
                <form action = "backend/backendController.php" method="post">
                    <input type="hidden" name="action" value="create">
                    <div class="form-group">
                        <label for="locatie">Locatie:</label>
                        <input type="text" name="locatie" id="locatie">
                    </div>
                    <div class="form-group">
                        <label for="aantal_personen">Aantal_personen:</label>
                        <input type="number" name="aantal_personen" id="aantal_personen">
                    </div>
                    <div class="form-group">
                        <label for="prijs_per_dag">Prijs per dag:</label>
                        <input type="number" name="prijs_per_dag" id="prijs_per_dag">
                    </div>
                    <div class="form-group">
                        <label for="afbeelding">Afbeelding:</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="beschrijving">Beschrijving:</label>
                        <textarea name="beschrijving" id ="beschrijving"></textarea>
                    </div>
                    <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
</body>