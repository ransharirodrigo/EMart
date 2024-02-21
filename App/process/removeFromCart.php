<?php
session_start();
include "../../libs/connection.php";

$product_id = $_GET["product_id"];

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    Database::execute("DELETE FROM `cart` WHERE `product_product_id`='$product_id' AND `user_email`='" . $user['email'] . "'");
    echo ("Success");
} else {
    echo ("Something went wrong.");
}
