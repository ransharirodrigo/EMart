<?php

include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check if the fields are set
    if (
        isset($_POST["category_id"]) &&
        isset($_POST["category_name"]) &&
        isset($_POST["status_id"])
    ) {
        //Store the values
        $category_id = $_POST["category_id"];
        $category_name = trim($_POST["category_name"]);
        $status_id = $_POST["status_id"];

        // Empty check
        if (empty($category_name)) {
            echo "Please enter category name.";
        } elseif (strlen($category_name) > 45) {
            echo "Category name should not exceed 45 characters.";
        } else {

            // Query
            $update_query = "UPDATE category SET `category_name` = '$category_name', `status_status_id` = '$status_id' WHERE category_id = '$category_id'";

            Database::execute($update_query);

            echo "Category details updated successfully.";
        }
    } else {
        echo "Something went wrong. Please try again.";
    }
}
