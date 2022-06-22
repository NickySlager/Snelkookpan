<?php require_once "header.php" ?>
<body>
    <div class="wrapper">
        <div class="introductie">
            <h1>Welkom op de overzicht pagina van Snelkookpan</h1>
        </div>
        <div class="filter-formulier">
                <form action ="backend/backendController.php" method="post">
                    <div class="form-group">
                        <label for="filter">Locatie Filter:</label>
                        <input type="text" name="locatie-filter" id ="locatie-filter">
                        <input type="hidden" name="action" value="optie-filter">
                    </div>
                        <input type="submit" name="submit" value="submit">
                </form>
       </div>
        <div class="overzicht-huizen">
            <?php
            require_once "backend/conn.php";
            $query = "SELECT * FROM huizen WHERE status = 0";
            $statement = $conn->prepare($query);
            $statement ->execute();
            $huizen = $statement->Fetchall(PDO::FETCH_ASSOC);
            foreach ($huizen as $huis)
            { ?>
                <div class="overzicht-huis">
                    <img src=<?php echo $huis["afbeelding"]; ?> alt="huis">
                    <div class="huis-informatie">
                        <p>Locatie:<?php echo $huis["locatie"];?>
                        <p>Aantal personen:<?php echo $huis["aantal_personen"];?>
                        <p>Prijs per dag:€<?php echo $huis["prijs_per_dag"]; ?></p>
                        <a href="detailspage.php?id=<?php echo $huis["id"];?>">Details</a>
                        <a href="reservepage.php?id=<?php echo $huis["id"];?>">Reserveren</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>
<?php require_once "footer.php"?>