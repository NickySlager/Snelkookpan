<?php require_once "../header.php"?>

<?php
$action = $_POST['action'];
if($action == "locatie-filter")
{   
    $locatieFilter=$_POST['locatie-filter'];
    require_once "conn.php";
    $query= "SELECT * FROM huizen WHERE :locatie = locatie AND status = 0" ;
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
if($action == "prijs-filter")
{   
    $prijsFilter= $_POST['prijsfilter'];
    if (empty($prijsFilter)){
        header("Location:../index.php");
    }
    require_once "conn.php";
    // van hoog naar laag 
    if($prijsFilter == 0)
    {
        $query= "SELECT * FROM huizen WHERE status = 0 ORDER BY prijs_per_dag DESC";
    }
    // van laag naar hoog
    if($prijsFilter == 1)
    {
        $query= "SELECT * FROM huizen WHERE status = 0 ORDER BY prijs_per_dag ASC";
    }
    $statement= $conn->prepare($query);
    $statement->execute();
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
if($action =="edit-status")
{
    $status= $_POST['status'];
    $id = $_POST['id'];
    require_once "conn.php";
    $query = "UPDATE huizen SET status = :status WHERE id =:id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":status" => $status,
        ":id" => $id
    ]);
    $query2 = "UPDATE reservaties SET status = :status WHERE id_gereserveerde_huis =:id";
    $statement = $conn->prepare($query2);
    $statement->execute([
        ":status" => $status,
        ":id" => $id
    ]);
    header("Location: ../statusoverview.php");
}
if($action =="reserveren")
{
    $huis_id = $_POST['huis_id'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    require_once "conn.php";
    $query = "INSERT INTO reservaties(email, phone_number, start_datum_reservatie, eind_datum_reservatie, id_gereserveerde_huis, status) VALUES(:email, :phone_number, :start_datum_reservatie, :eind_datum_reservatie, :id_gereserveerde_huis, :status)";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":email" =>$email,
        ":phone_number" => $phone_number,
        ":start_datum_reservatie" =>$start_date,
        ":eind_datum_reservatie" => $end_date,
        ":id_gereserveerde_huis" => $huis_id,
        ":status" => $status
    ]);
    header("Location: ../index.php");
}
if($action =="delete")
{
    $id = $_POST['id'];
    require_once "conn.php";
    $query = "DELETE FROM reservaties WHERE id =:id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id
    ]);
    header("Location: ../index.php");
}

?>