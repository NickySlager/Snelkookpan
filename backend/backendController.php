<?php require_once "../header.php"?>

<?php
$action = $_POST['action'];
if($action == "filter")
{  
    $locatieFilter=$_POST['locatie-filter'];
    $prijsFilter = $_POST['prijs-filter'];
    $personenFilter= $_POST['personen-filter'];

    require_once "conn.php";
    $query= "SELECT * FROM huizen WHERE status = 0";

    if(!empty($locatieFilter))
    {
        $query .=" AND locatie = '$locatieFilter'";
    }
    if(!empty($prijsFilter))
    {
        $query .=" AND prijs_per_dag < $prijsFilter";
    }
    if(isset($personenFilter))
    {
        $query .=" AND aantal_personen = $personenFilter";
    }
    $statement= $conn->prepare($query);
    $statement->execute();
    $huizen = $statement->Fetchall(PDO::FETCH_ASSOC);

    
     ?>
    <body>
        <div class="wrapper">
            <h1>Filter Overzicht</h1>
            <div class="overzicht-huizen">
            <?php
            foreach($huizen as $huis)
            { ?>
                <div class="overzicht-huis">
                            <img src=../img/<?php echo $huis["afbeelding"]; ?> alt="huis">
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
    $huis_id= $_POST['huis_id'];
    require_once "conn.php";
    $query = "UPDATE huizen SET status = :status WHERE id =:id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":status" => $status,
        ":id" => $huis_id,
    ]);
    $query2 = "UPDATE reservaties SET status = :status WHERE id_gereserveerde_huis =:huis_id";
    $statement = $conn->prepare($query2);
    $statement->execute([
        ":status" => $status,
        ":huis_id" => $huis_id
    ]);
    header("Location: $base_url/statusoverview.php");
    
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
    if(isset($query))
    {   
        header("Location:$base_url/index.php");
    }

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
    header("Location: $base_url/statusoverview.php");
}
if($action =="create")
{
    $locatie = $_POST['locatie'];
    $aantal_personen=$_POST['aantal_personen'];
    $prijs_per_dag = $_POST['prijs_per_dag'];
    $image =$_POST['image'];
    $beschrijving = $_POST['beschrijving'];
    require_once "conn.php";
    $query= "INSERT INTO huizen(locatie, aantal_personen, prijs_per_dag, afbeelding, beschrijving) VALUES(:locatie, :aantal_personen, :prijs_per_dag, :afbeelding, :beschrijving)";
    $statement = $conn->prepare($query);
    $statement ->execute([
        ":locatie" => $locatie,
        ":aantal_personen"=>$aantal_personen,
        ":prijs_per_dag"=> $prijs_per_dag,
        ":afbeelding"=> $image,
        ":beschrijving"=>$beschrijving
    ]);
    header("Location:$base_url/index.php");
    echo "<script>alert('image has been uploaded')</script>";
}
if($action =="reviews")
{   $date_of_posting=$_POST['date_of_posting'];
    $huis_id=$_POST['huis_id'];
    $name=$_POST['name'];
    $review=$_POST['review'];
    require_once "conn.php";
    $query= "INSERT INTO reviews(name, review, huis_id, date_of_posting) VALUES(:name, :review, :huis_id, :date_of_posting)";
    $statement= $conn->prepare($query);
    $statement->execute([
        ":name" =>$name,
        ":review"=>$review,
        ":huis_id"=> $huis_id,
        ":date_of_posting"=>$date_of_posting
    ]);
    header("Location: $base_url/detailspage.php?id=$huis_id");
}

?>