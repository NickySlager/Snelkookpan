<?php require_once "../header.php"?>

<?php
$action = $_POST['action'];

if($action == "optie-filter")
{
    $locatieFilter=$_POST['locatie-filter'];
    require_once "conn.php";
    $query= "SELECT * FROM huizen WHERE :locatie = locatie";
    $statement= $conn->prepare($query);
    $statement->execute([
        ":locatie"=> $locatieFilter
    ]);
    $huizen = $statement->Fetchall(PDO::FETCH_ASSOC);
    ?>
    <body>
        <div class="wrapper">
            <h1>Locatie Overzicht</h1>
            <div class="overzicht-huizen">
            <?php
            foreach($huizen as $huis)
            { ?>
                <div class="overzicht-huis">
                            <img src=<?php echo $huis["afbeelding"]; ?> alt="huis">
                            <div class="huis-informatie">
                                <p>Locatie:<?php echo $huis["locatie"];?>
                                <p>Aantal personen:<?php echo $huis["aantal_personen"];?>
                                <p>Prijs per dag:€<?php echo $huis["prijs_per_dag"]; ?></p>
                                <a href="http://localhost/snelkookpan/detailspage.php?id=<?php echo $huis["id"];?>">Details</a>
                                <a href="http://localhost/snelkookpan/reservepage.php?id=<?php echo $huis["id"];?>">Reserveren</a>
                            </div>
                        </div>
                    <?php
            }
            ?>
            </div>
        </div>
    </body>
        <?php

}
?>