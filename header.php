<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/snelkookpan/css/style.css"/>
    <title>Header</title>
</head>
<header>
    <div class="logo">
    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
    </div>
    <nav>
        <a href=http://localhost/snelkookpan/index.php>Home</a>
        <?Php if(isset($_SESSION['user_id'])): ?>
            <a href="http://localhost/snelkookpan/statusoverview.php">Status</a>
            <a href="http://localhost/snelkookpan/create.php">Create</a>
        <?php endif; ?>
        <?php if(!isset($_SESSION['user_id'])): ?>
            <a href =http://localhost/snelkookpan/login.php>Inloggen</a>
        <?php endif;?>
        <?php if(isset($_SESSION['user_id'])):?>          
            <a href="http://localhost/snelkookpan/logout.php">Logout</a>
        <?php endif; ?>
    </nav>
</header>