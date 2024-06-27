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
        } elseif (!isset($_FILES["product_image"])) {
            echo "Please upload an image.";
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

            $image_path = '';

            // Allowed types
            $allowed_types = array("image/jpeg", "image/png", "image/svg+xml");

            $file_type = $_FILES["product_image"]["type"];

            if (in_array($file_type, $allowed_types)) {

                $new_img_extension;

                if ($file_type == "image/jpeg") {
                    $new_img_extension = ".jpeg";
                } else if ($file_type == "image/png") {
                    $new_img_extension = ".png";
                } else if ($file_type == "image/svg+xml") {
                    $new_img_extension = ".svg";
                }

                $imageName;

                $file_name =  "../../assets/img/product_images//" . $_FILES["product_image"]["name"] .  $new_img_extension;
                $image_path = "assets/img/product_images/" . $_FILES["product_image"]["name"] . $new_img_extension;

                move_uploaded_file($_FILES["product_image"]["tmp_name"], $file_name);
            } else {
                echo "Only JPEG, PNG, and SVG files are allowed.";
                exit;
            }

            Database::execute("UPDATE `product` SET
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

            $product_image_resultset = Database::execute("SELECT * FROM `product_images` WHERE `product_product_id`='$product_id'");

            if ($product_image_resultset->num_rows == 1) {
                Database::execute("UPDATE `product_images` SET `path`='$image_path' WHERE `product_product_id`='$product_id'");
            } elseif ($product_image_resultset->num_rows == 0) {
                Database::execute("INSERT INTO `product_images` (`path`,`product_product_id`) VALUES ('$image_path','$product_id')");
            }

            echo "Product Details Updated Successfully";
        }
    } else {
        echo "Something went wrong. Please try again.";
    }
}
