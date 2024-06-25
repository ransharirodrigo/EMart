<?php

include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        isset($_POST["product_id"]) &&
        isset($_POST["delivery_fee_colombo"]) &&
        isset($_POST["delivery_fee_other"]) &&
        isset($_POST["product_title"]) &&
        isset($_POST["product_description"]) &&
        isset($_POST["price"]) &&
        isset($_POST["product_color_id"]) &&
        isset($_POST["category_id"]) &&
        isset($_POST["brand_id"]) &&
        isset($_POST["product_status"]) &&
        isset($_POST["product_model_id"]) &&
        isset($_POST["productQuantity"])
    ) {
        if (empty($_POST["product_title"])) {
            echo "Please enter product title.";
        } elseif (strlen($_POST["product_title"]) > 50) {
            echo "Product title should not exceed 50 characters.";
        } elseif (empty($_POST["product_description"])) {
            echo "Please enter product description.";
        } elseif (strlen($_POST["product_description"]) > 100) {
            echo "Product description should not exceed 100 characters.";
        } elseif (empty($_POST["price"])) {
            echo "Please enter product price.";
        } elseif (empty($_POST["delivery_fee_colombo"])) {
            echo "Please enter delivery fee for Colombo.";
        } elseif (empty($_POST["delivery_fee_other"])) {
            echo "Please enter delivery fee for Other areas.";
        } elseif (empty($_POST["productQuantity"])) {
            echo "Please enter product quantity.";
        } else {
            $product_id = $_POST["product_id"];
            $delivery_fee_colombo = $_POST["delivery_fee_colombo"];
            $delivery_fee_other = $_POST["delivery_fee_other"];
            $product_title = $_POST["product_title"];
            $product_description = $_POST["product_description"];
            $price = $_POST["price"];
            $product_color_id = $_POST["product_color_id"];
            $category_id = $_POST["category_id"];
            $brand_id = $_POST["brand_id"];
            $product_status = $_POST["product_status"];
            $product_model_id = $_POST["product_model_id"];
            $productQuantity = $_POST["productQuantity"];


            $result = Database::execute("UPDATE `product` SET
                `title` = '$product_title',
                `description` = '$product_description',
                `price` = '$price',
                `delivery_fee_colombo` = '$delivery_fee_colombo',
                `delivery_fee_other` = '$delivery_fee_other',
                `color_color_id` = '$product_color_id',
                `category_category_id` = '$category_id',
                `brand_brand_id` = '$brand_id',
                `status_status_id` = '$product_status',
                `model_model_id` = '$product_model_id',
                `qty`='$productQuantity'
            WHERE `product_id` = '$product_id'");


            echo "Product Details Updated Successfully";
        }
    } else {
        echo "Something went wrong. Please try again.";
    }
}
