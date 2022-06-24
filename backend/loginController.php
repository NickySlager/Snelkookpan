<?php
session_start();
$username =$_POST['username'];
$password =$_POST['password'];
$hashed_password = hash("SHA256",$password);
require_once "conn.php";
$query = "SELECT * FROM personeel WHERE username = :username";
$statement = $conn->prepare($query);
$statement ->execute([
    ":username" =>$username
]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
if ($statement->rowcount() < 1)
{
    die("Error het account bestaat niet");
}

if ($hashed_password != $user['password'])
{
    die("Ongeldige gegevens");
}
$_SESSION['user_id'] = $user['id'];
Header("Location: $base_url/index.php");

?>