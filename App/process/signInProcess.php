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
        if ($remember_me == true) {
            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("password", $password, time() + (60 * 60 * 24 * 365));
        } else {
        }
    } else {
        echo ("Invalid credentials");
    }
}
