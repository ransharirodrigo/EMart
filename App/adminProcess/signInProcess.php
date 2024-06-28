<?php
$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)) {
    echo ("Please enter Your Email");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Please enter a valid Email Address");
} elseif (empty($password)) {
    echo ("Please enter your password");
} else {

    include "../../libs/connection.php";

    $user_resultset = Database::execute("SELECT * FROM `user` WHERE `email`='$email' AND `user_type_user_type_id`='2'");

    if ($user_resultset->num_rows == 1) {

        $user_data = $user_resultset->fetch_assoc();

        if (password_verify($password, $user_data['password'])) {

            session_start();
            $_SESSION["admin"] = [
                "name" => $user_data["first_name"] . " " . $user_data["last_name"],
                "email" => $user_data["email"]
            ];

            echo ("success");
        } else {
            echo ("Invalid credentials");
        }
    } else {
        echo ("Invalid credentials");
    }
}
