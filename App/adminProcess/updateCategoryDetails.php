<?php

include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check if the fields are set
    if (
        isset($_POST["category_id"]) &&
        isset($_POST["category_name"]) &&
        isset($_POST["status_id"])
    ) {
        // Store the values
        $category_id = $_POST["category_id"];
        $category_name = trim($_POST["category_name"]);
        $status_id = $_POST["status_id"];

        // Empty check
        if (empty($category_name)) {
            echo "Please enter category name.";
        } elseif (strlen($category_name) > 45) {
            echo "Category name should not exceed 45 characters.";
        } elseif (!isset($_FILES["category_image"])) {
            echo "Please upload an image.";
        } else {

            $image_path = '';

            // Allowed types
            $allowed_types = array("image/jpeg", "image/png", "image/svg+xml");

            $file_type = $_FILES["category_image"]["type"];

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

                $file_name =  "../../assets/img/category_images//" . $category_name . "_category_image" . $new_img_extension;
                $image_path = "assets/img/category_images/" . $category_name . "_category_image" . $new_img_extension;

                move_uploaded_file($_FILES["category_image"]["tmp_name"], $file_name);
            } else {
                echo "Only JPEG, PNG, and SVG files are allowed.";
                exit;
            }


            // Update query
            $update_query = "UPDATE category SET `category_name` = '$category_name', `status_status_id` = '$status_id', `category_img` = '$image_path' WHERE `category_id` = '$category_id'";

            Database::execute($update_query);

            echo "Category details updated successfully.";
        }
    } else {
        echo "Something went wrong. Please try again.";
    }
}
