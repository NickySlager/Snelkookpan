<?php require_once "header.php" ?>
<?php
$id = $_GET['id'];
require_once "backend/conn.php";
$query = "SELECT * FROM huizen WHERE :id = id";
$statement = $conn->prepare($query);
$statement ->execute([
    ":id" => $id
]);
$huis = $statement->fetch(PDO::FETCH_ASSOC);
?>
<body>
    <div class="wrapper">
        <div class="introductie">
            <h1>Details Huis</h1>
        </div>
        <div class="details-huis">
            <img src=<?php echo $huis["afbeelding"];?>>
            <div class="huis-informatie">
                <p>Locatie:<?php echo $huis["locatie"];?></p>
                <p>Aantal personen:<?php echo $huis["aantal_personen"];?></p>
                <p>Prijs per dag:€<?php echo $huis["prijs_per_dag"];?></p>
                <p>Beschrijving:<?php echo $huis["beschrijving"];?></p>
                <a href="reservepage.php?id=<?php echo $huis["id"];?>">
                <input type="submit" value="Reserveren">
            </div>
        </div>
    </div>
</body>

<?php require_once "footer.php"?>