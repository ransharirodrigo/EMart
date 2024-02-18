<?php
session_start();
include "../../libs/connection.php";

$product_id = $_GET["product_id"];

if ($_SESSION["user_wishlist_id"]) {
    $use_wishlist_id = $_SESSION["user_wishlist_id"];

    Database::execute("DELETE FROM `wishlist` WHERE `user_wishlist_id`='$use_wishlist_id' AND `product_id`='$product_id'");
    echo ("Success");
} else {
    echo ("Something went wrong");
}
