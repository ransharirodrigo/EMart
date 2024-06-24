<?php

include "../../libs/connection.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        isset($_POST["product_id"]) &&
        isset($_POST["delivery_fee_colombo"]) &&
        isset($_POST["delivery_fee_other"]) &&
        isset($_POST["product_title"]) &&
        isset($_POST["product_description"]) &&
        isset($_POST["qty"]) &&
        isset($_POST["price"]) &&
        isset($_POST["product_color_id"]) &&
        isset($_POST["category_id"]) &&
        isset($_POST["brand_id"]) &&
        isset($_POST["product_status"]) &&
        isset($_POST["product_model_id"])
    ) {

        $product_id = $_POST["product_id"];
        $delivery_fee_colombo = $_POST["delivery_fee_colombo"];
        $delivery_fee_other = $_POST["delivery_fee_other"];
        $product_title = $_POST["product_title"];
        $product_description = $_POST["product_description"];
        $qty = $_POST["qty"];
        $price = $_POST["price"];
        $product_color_id = $_POST["product_color_id"];
        $category_id = $_POST["category_id"];
        $brand_id = $_POST["brand_id"];
        $product_status = $_POST["product_status"];
        $product_model_id = $_POST["product_model_id"];

        $result = Database::execute("UPDATE `product` SET
            `title` = '$product_title',
            `description` = '$product_description',
            `qty` = '$qty',
            `price` = '$price',
            `delivery_fee_colombo` = '$delivery_fee_colombo',
            `delivery_fee_other` = '$delivery_fee_other',
            `color_color_id` = '$product_color_id',
            `category_category_id` = '$category_id',
            `brand_brand_id` = '$brand_id',
            `status_status_id` = '$product_status',
            `model_model_id` = '$product_model_id'
        WHERE `product_id` = '$product_id'");

        echo "Product Details Updated Successfully";
    } else {
        echo "Something went wrong. Please try again.";
    }
}
