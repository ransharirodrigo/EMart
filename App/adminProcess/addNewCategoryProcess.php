<?php
include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Check if category_name is set
    if (isset($_GET["categoryName"])) {

        // Retrieve and trim category_name
        $category_name = trim($_GET["categoryName"]);

        // Check if category_name is not empty after trimming
        if (!empty($category_name)) {

            // Check if category_name does not exceed 45 characters
            if (strlen($category_name) <= 45) {

                // Check if category with the same name already exists
                $check_query = "SELECT * FROM category WHERE `category_name` = '$category_name'";
                $result = Database::execute($check_query);

                if ($result->num_rows > 0) {
                    // Category already exists
                    echo "Category already exists.";
                } else {
                    // Insert new category
                    $insert_query = "INSERT INTO category (`category_name`, `status_status_id`) VALUES ('$category_name', '1')";

                    Database::execute($insert_query);

                    echo "Category added successfully.";
                }
            } else {
                echo "Category name should not exceed 45 characters.";
            }
        } else {
            echo "Please enter category name";
        }
    } else {
        echo "Please enter category name.";
    }
} else {
    echo "Something went wrong";
}
