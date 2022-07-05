<?php session_start(); ?>
<?php if(!isset($_SESSION['user_id']))
{
    echo "u heeft geen toegang tot deze pagina";
    Header("Location: $base_url Index.php");
}
?>
<?php require_once "header.php" ?>
<body>
    <div class="wrapper">
    <?php
    require_once "backend/conn.php";
    $query = "SELECT * FROM reservaties";
    $statement = $conn->prepare($query);
    $statement ->execute();
    $reservaties = $statement->Fetchall(PDO::FETCH_ASSOC);
    ?>
    <div class="introductie">
        <h1>Aanvraag Reservaties</h1>
    </div>
    <div class="status-container">
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>ID Huis</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Start Datum</th>
                    <th>Eind-datum</th>
                    <th>Status</th>
                </tr>
        <?php
    foreach($reservaties as $reservatie)
    {
        ?>
        <tr>
            <td><?php echo $reservatie['id']; ?></td>
            <td><?php echo $reservatie["id_gereserveerde_huis"]; ?></td>
            <td><?php echo $reservatie["email"]; ?></td>
            <td><?php echo $reservatie["phone_number"]; ?></td>
            <td><?php echo $reservatie["start_datum_reservatie"]; ?></td>
            <td><?php echo $reservatie["eind_datum_reservatie"]; ?></td>
            <td>
                <form action="backend/backendController.php" method="POST">
                    <input type="hidden" name="action" value="edit-status">
                    <input type="hidden" name ="huis_id" value="<?php echo $reservatie['id_gereserveerde_huis'];?>">
                    <select id="status" name="status">
                        <option value="" selected="selected" hidden="hidden"><?php
                    if  (($reservatie["status"]) == 1)
                    {
                        echo "Gereserveerd";
                    }
                    else
                    {
                        echo "Niet Gereserveerd";
                    }?></option>
                        <option value="0">Niet Gereserveerd</option>
                        <option value="1">Gereserveerd</option>
                    </select>
                    <td><input type="submit" value="submit"></td>
                </form>
                <td>
                    <form action="backend/backendController.php" method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type ="hidden" name="id" value="<?php echo $reservatie['id'];?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </td>

        </tr>
        <?php
        
    }
    
    
    ?>
            </table>
    </div>

    </div>
</body>
<?php require_once "footer.php"?>