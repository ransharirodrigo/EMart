<?php
include "../../libs/connection.php";

$product_id = $_GET["product_id"];

session_start();


function generateUniqueUserWishlistId($callback)
{
    do {
        $user_wishlist_unique_id = bin2hex(random_bytes(16));
        $user_wishlist_id_resultset1 = Database::execute("SELECT * FROM `user_wishlist_id` WHERE `wishlist_id`='$user_wishlist_unique_id'");
    } while ($user_wishlist_id_resultset1->num_rows == 1);

    // When a unique ID is generated, call the provided callback
    call_user_func($callback, $user_wishlist_unique_id);
}

function insertProductIntoWishlist($user_wishlist_id, $product_id)
{
    $user_wishlist_resultset = Database::execute("SELECT * FROM `wishlist` WHERE `user_wishlist_id`='$user_wishlist_id' AND `product_id`='$product_id'");

    if ($user_wishlist_resultset->num_rows == 0) {
        // Insert into wishlist table
        Database::execute("INSERT INTO `wishlist` (`user_wishlist_id`,`product_id`) VALUES ('$user_wishlist_id','$product_id')");
        echo "success";
    } else {
        echo "Product is already in your wishlist";
    }
}

function insertUserWishlistId($callback)
{

    Database::execute("INSERT INTO `user_wishlist_id` VALUES ('" . $_SESSION["user_wishlist_id"] . "')");
    call_user_func($callback,$_SESSION["user_wishlist_id"]);
}

if (isset($_SESSION["user_wishlist_id"])) {

    //check if the user exist in the user_wishlist_id table
    $user_wishlist_id = $_SESSION["user_wishlist_id"];
    $user_wishlist_id_resultset =  Database::execute("SELECT * FROM `user_wishlist_id` WHERE `wishlist_id`='$user_wishlist_id'");

    if ($user_wishlist_id_resultset->num_rows == 1) {
        $user_wishlist_resultset = Database::execute("SELECT * FROM `wishlist` WHERE `user_wishlist_id`='$user_wishlist_id' AND `product_id`='$product_id'");

        if ($user_wishlist_resultset->num_rows == 0) {

            //insert into wishlist table
            Database::execute("INSERT INTO `wishlist` (`user_wishlist_id`,`product_id`) VALUES ('$user_wishlist_id','$product_id')");
            echo ("success");
        } else {
            echo ("Product is already in your wishlist");
        }
    } else {

        //Even though the user_wishlist_id exist on session variable, user does not exist in the table
        $_SESSION["user_wishlist_id"] = null;
        echo ("Something went wrong. Please try again");
    }
} else {


    generateUniqueUserWishlistId(function ($user_wishlist_id) use ($product_id) {
        $_SESSION["user_wishlist_id"] = $user_wishlist_id;

        insertUserWishlistId(function ($user_wishlist_id) use ($product_id) {

            insertProductIntoWishlist($user_wishlist_id, $product_id);
        });
    });

}
