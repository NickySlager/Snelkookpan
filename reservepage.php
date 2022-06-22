<?php require_once "header.php" ?>
<div class="wrapper">
    <div class="reservatie-formulier">
        <form action ="backend/backendController.php" method="POST">
            <input type="hidden" name="action" value="reserveren">
            <input type="hidden" name ="huis_id" value="<?php echo $_GET['id']?>">
            <input type="hidden" name="status" value="0">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
        	<div class="form-group">
                <label for="phone_number">Telefoon nummer:</label>
                <input type="tel" name="phone_number" id="phone_number">
            </div>
            <div class="form-group">
                <label for="start_datum_reservatie">Start Datum-reservatie</label>
                <input type="date" name="start_date" id="start_date">
            </div>
            <div class="form-group">
                <label for="eind_datum_reservatie">Eind Datum-reservatie</label>
                <input type="date" name="end_date" id="end_date">
            </div>
            <input type ="submit" value="submit">
        </form>
    </div>
</div>
