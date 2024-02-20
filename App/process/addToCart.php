<?php

include "../../libs/connection.php";

$product_id = $_GET["product_id"];


session_start();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    $user_resultset = Database::execute("SELECT * FROM `user` WHERE `email`='" . $_SESSION["user"]["email"] . "'");

    if ($user_resultset->num_rows == 1) {

        $cart_resultset =  Database::execute("SELECT * FROM `cart` WHERE `product_product_id`='$product_id' AND `user_email`='" . $user['email'] . "'");

        if ($cart_resultset->num_rows == 1) {
            echo ("Product is already in your cart. Try increasing the quantity");
        } else {
            Database::execute("INSERT INTO `cart`(`product_product_id`,`user_email`,`qty`) VALUES ('" . $product_id . "','" . $user["email"] . "','1') ");
            echo ("Product successfully added to your cart");
        }
    } else {
        $_SESSION["user"] = null;
        echo ("Something went wrong. Try Sign In again");
    }
} else {
    echo "Login First";
}
