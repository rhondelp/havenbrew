<?php

session_start(); //
require_once "config.php"; // ge point nato si config.php(connection sa database)

$email = $_POST["email"]; //johndoe@gmail.com
$password = $_POST["password"]; //user123
                                        //johndoe@gmail.com
$sql = "SELECT * FROM users WHERE email = '$email'"; //query

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result); // kuhaon niya tanang details ne john doe
                        //stored(reg) = user123
    if (password_verify($password, $user["password"])) {

        $_SESSION["user_id"] = $user["id"]; // id
        $_SESSION["fullname"] = $user["fullname"]; //fullname

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
