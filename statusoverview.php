<?php require_once "header.php" ?>
<body>
    <div class="wrapper">
    <?php
    require_once "backend/conn.php";
    $query = "SELECT * FROM huizen";
    $statement = $conn->prepare($query);
    $statement ->execute();
    $huizen = $statement->Fetchall(PDO::FETCH_ASSOC);
    ?>
    <div class="status-container">
            <table>
                <tr>
                    <th>ID Huis</th>
                    <th>Locatie</th>
                    <th>aantal personen</th>
                    <th>Prijs per dag</th>
                    <th>Status</th>
                </tr>
        <?php
    foreach($huizen as $huis)
    {
        ?>
        <tr>
            <td><?php echo $huis["id"]; ?></td>
            <td><?php echo $huis["locatie"]; ?></td>
            <td><?php echo $huis["aantal_personen"]; ?></td>
            <td>€<?php echo $huis["prijs_per_dag"]; ?></td>
            <td><form action="backend/backendController.php" method="POST">
                    <input type="hidden" name="action" value="edit-status">
                    <input type ="hidden" name="id" value="<?php echo $huis['id'];?>">
                    <select id="status" name="status">
                        <option value="" selected="selected" hidden="hidden"><?php
                    if  (($huis["status"]) == 1)
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
            </td>

        </tr>
        <?php
        
    }
    
    
    ?>
            </table>
    </div>

    </div>
</body>