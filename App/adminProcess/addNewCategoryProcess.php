<?php
include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST["categoryName"])) {
        echo "Please enter category name.";
    } elseif (empty(trim($_POST["categoryName"]))) {
        echo "Category name should not be empty.";
    } elseif (strlen($_POST["categoryName"]) > 45) {
        echo "Category name should not exceed 45 characters.";
    } elseif (!isset($_FILES["categoryImage"])) {
        echo "Please upload category image.";
    } else {

        $image_path = '';

        // Allowed types
        $allowed_types = array("image/jpeg", "image/png", "image/svg+xml");

        $file_type = $_FILES["categoryImage"]["type"];

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

        $insertQuery = "INSERT INTO category (`category_name`, `image`, `status_status_id`) VALUES ('$categoryName', '$targetFilePath', '1')";
        Database::execute($insertQuery);
        echo "Category added successfully.";
    }
} else {
    echo "Invalid request method.";
}
