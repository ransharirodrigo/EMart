<?php
$email = $_POST["email"];
$password = $_POST["password"];
$remember_me = $_POST["remember_me"];

if (empty($email)) {
    echo ("Please enter Your Email");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Please enter a valid Email Address");
} elseif (empty($password)) {
    echo ("Please enter your password");
} else {

    include "../../libs/connection.php";

    $user_resultset = Database::execute("SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'");

    if ($user_resultset->num_rows == 1) {
        session_start();
        $_SESSION["user"] = $user_resultset->fetch_assoc();

        if ($remember_me == true) {
            setcookie("email", "email", time() + 20 * 24 * 60 * 60);
            setcookie("password", "password", time() + 20 * 24 * 60 * 60);
        } else {
            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }

        echo ("success");
    } else {
        echo ("Invalid credentials");
    }
}
