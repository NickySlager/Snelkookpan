<?php session_start(); ?>
<?php require_once "header.php" ?>
<body>
    <div class="wrapper">
        <div class="introductie">
            <h1>Welkom op de overzicht pagina van Snelkookpan</h1>
        </div>
        <div class="filters">
                <form action ="backend/backendController.php" method="post">
                    <div class="form-group">
                        <label for="filter">Locatie Filter:</label>
                            <input type="text" name="locatie-filter" id ="locatie-filter">
                    </div>
                    <div class="form-group">
                        <label for ="prijsfilter">Prijs Filter</label>
                            <select id ="prijs-filter" name="prijs-filter" style="width:200px;">
                                <option value="" selected="selected" hidden="hidden"></option>
                                <option value="0">Van hoog naar laag</option>
                                <option value ="1">Van laag naar hoog</option>
                            </select>
                        <input type="hidden" name="action" value="filter">
                    </div>
                    <div class="form-group">
                       <label for="personen-filter">Aantal personen Filter</label>
                       <input type="number" name="personen-filter" id="personen-filter" style="width:117px;"> 	
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