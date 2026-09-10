<?php

session_start();
require_once "config.php";

$fullname = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

if ($password != $confirm_password) {
    header("Location: ../register.php?error=passwords_do_not_match");
    exit();
}

$password = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (fullname, email, password)
        VALUES ('$fullname', '$email', '$password')";

if (mysqli_query($conn, $sql)) {

    header("Location: ../login.php?success=registered");
    exit();

} else {

    header("Location: ../register.php?error=registration_failed");
    exit();

}
