<?php session_start(); ?>
<?php require_once "header.php" ?>
<body>
    <div class="wrapper">
        <div class="introductie">
            <h1>Welkom op de overzicht pagina van Snelkookpan</h1>
        </div>
        <div class="banner">
            
        </div>
        <div class="filters">
                <form action ="backend/backendController.php" method="post">
                    <input type="hidden" name="action" value="filter">
                    <div class="form-group">
                        <div class="div1">
                        <label for="filter">Locatie Filter:</label>
                            <input type="text" name="locatie-filter" id ="locatie-filter">
                            </div>    
                    </div>
                    <div class="form-group">
                        <div class="div1">
                        <label for ="prijsfilter">Prijs Filter:</label>
                            <select id ="prijs-filter" name="prijs-filter" style="width:200px;">
                                <option value="" selected="selected" hidden="hidden"></option>
                                <option value="50">< $50</option>
                                <option value ="100">< $100</option>
                                <option value ="150">< $150</option>
                                <option value ="200">< $200</option>
                            </select>
                            </div>    
                    </div>
                    <div class="form-group">
                        <div class="div1">
                            <label for="personen-filter">Aantal personen Filter:</label>
                            <input type="number" min="0" name="personen-filter" id="personen-filter" style="width:117px;">  
                        </div>
                        <div class="div2">
                        <input type="submit" name="submit" value="submit"> 
                        </div>   	
                    </div>    
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
                    <img src=img/<?php echo $huis["afbeelding"]; ?> alt="huis">
                    <div class="huis-informatie">
                        <p><b>Locatie:</b> <?php echo $huis["locatie"];?>
                        <p><b>Aantal personen:</b> <?php echo $huis["aantal_personen"];?>
                        <p><b>Prijs per dag:</b> ???<?php echo $huis["prijs_per_dag"]; ?></p>
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