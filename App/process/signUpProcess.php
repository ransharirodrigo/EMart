<?php

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$username = $_POST["username"];
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
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Please enter a valid Email Address");
}elseif (empty($mobile)) {
 echo("Please enter your Mobile Number");
}elseif (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}$/",$mobile)) {
    echo("Please enter a valid Mobile Number");
}
