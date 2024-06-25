<?php
include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check if the fields are set
    if (
        isset($_POST["brand_id"]) &&
        isset($_POST["brand_name"]) &&
        isset($_POST["status_id"])
    ) {
        // Store the values
        $brand_id = $_POST["brand_id"];
        $brand_name = trim($_POST["brand_name"]);
        $status_id = $_POST["status_id"];

        // Empty check
        if (empty($brand_name)) {
            echo "Please enter brand name.";
        } elseif (strlen($brand_name) > 45) {
            echo "Brand name should not exceed 45 characters.";
        } else {
            // Query
            $update_query = "UPDATE brand SET `brand_name` = '$brand_name', `status_status_id` = '$status_id' WHERE brand_id = '$brand_id'";

            Database::execute($update_query);

            echo "Brand details updated successfully.";
        }
    } else {
        echo "Something went wrong. Please try again.";
    }
}
