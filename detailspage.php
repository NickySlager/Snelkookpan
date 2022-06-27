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
            <img src=img/<?php echo $huis["afbeelding"];?>>
            <div class="huis-informatie">
                <p>Locatie:<?php echo $huis["locatie"];?></p>
                <p>Aantal personen:<?php echo $huis["aantal_personen"];?></p>
                <p>Prijs per dag:€<?php echo $huis["prijs_per_dag"];?></p>
                <p>Beschrijving:<?php echo $huis["beschrijving"];?></p>
                <button>
                    <a href="reservepage.php?id=<?php echo $huis["id"];?>">Reserveren</a>                  
                </button>
            </div>
        </div>
        <div class="reviews">
            <div class="review-form-container">
                <form action="backend/backendController.php" method="post">
                    <input type="hidden" name="action" value="reviews">
                    <input type="hidden" name="huis_id" value="<?php echo $_GET['id'];?>">
                    <input type="hidden" name="date_of_posting" value="<?php echo date('Y-m-d');?>">
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="review">Review:</label>
                        <textarea name="review" id="review" wordwrap="wrap" style="width:500px; height:50px;"></textarea>
                    </div>
                    <input type="submit" value="submit">
                </form>
            </div>
            <?php 
            $huis_id = $_GET['id'];
            $date_check_min = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") -5, date("Y")));
            require_once "backend/conn.php";
            $query="SELECT * FROM reviews WHERE huis_id =:huis_id AND date_of_posting > :date_check_min";
            $statement=$conn->prepare($query);
            $statement->execute([
                ":huis_id" =>$huis_id,
                ":date_check_min"=>$date_check_min,

            ]);
            $reviews = $statement->Fetchall(PDO::FETCH_ASSOC);
            ?>
            <h2>Reviews</h2>
            <?php foreach($reviews as $review)
            { ?>
            <div class="overzicht-reviews">
                <h3>Naam:<?php echo $review['name']; ?></h3>
                <textarea style="width:500px; height:50px;" readonly><?php echo $review['review'];?></textarea>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

<?php require_once "footer.php"?>