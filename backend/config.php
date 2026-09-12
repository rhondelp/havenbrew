//connection ranii sa database
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "havenbrew_db"; // name sa enyuhang database

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>