<?php

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];

if (empty($first_name)) {
    echo ("Please fill your First Name");
} else if (strlen($first_name) > 50) {
    echo ("First Name must contain lower than 50 characters");
} elseif (empty($last_name)) {
    echo ("Please fill your Last Name");
} elseif (strlen($last_name) > 50) {
    echo ("Last Name must contain lower than 50 characters");
} elseif (empty($email)) {
    echo ("Please fill your Email Address");
} elseif (strlen($email) > 100) {
    echo ("Your Email address is too lengthy");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Please enter a valid Email Address");
} elseif (empty($mobile)) {
    echo ("Please enter your Mobile Number");
} elseif (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}$/", $mobile)) {
    echo ("Please enter a valid Mobile Number");
}  elseif (empty($password)) {
    echo ("Please enter your password");
} elseif (strlen($password) < 8 || strlen($password) > 50) {
    echo ("Your password must contain between 8 to 50 characters");
} else {
    include "../../libs/connection.php";

    $user_details_resultset = Database::execute("SELECT * FROM `user` WHERE `email`='$email'");
    if ($user_details_resultset->num_rows == 0) {
        Database::execute("INSERT INTO `user` (`email`,`first_name`,`last_name`,`password`,`mobile`,`user_type_user_type_id`) VALUES ('$email','$first_name','$last_name','$password','$mobile','1')");
        echo ("success");
    } else if ($user_details_resultset->num_rows == 1) {
        echo ("User already registered");
    }
}
