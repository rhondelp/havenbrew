<?php

session_start();
require_once "config.php";

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user["password"])) {

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["fullname"] = $user["fullname"];

        header("Location: ../index.php");
        exit();

    } else {

        header("Location: ../login.php?error=wrong_password");
        exit();

    }

} else {

    header("Location: ../login.php?error=user_not_found");
    exit();

}
