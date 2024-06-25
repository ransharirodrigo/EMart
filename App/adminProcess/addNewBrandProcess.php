<?php
include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Check if brand name is set
    if (isset($_GET["brandName"])) {

        // Retrieve and trim brand name
        $brand_name = trim($_GET["brandName"]);

        // Check if brand name is not empty after trimming
        if (!empty($brand_name)) {

            // Check if brand name does not exceed 45 characters
            if (strlen($brand_name) <= 45) {

                // Check if brand with the same name already exists
                $check_query = "SELECT * FROM brand WHERE `brand_name` = '$brand_name'";
                $result = Database::execute($check_query);

                if ($result->num_rows > 0) {
                    // Brand already exists
                    echo "Brand already exists.";
                } else {
                    // Insert new brand
                    $insert_query = "INSERT INTO brand (`brand_name`, `status_status_id`) VALUES ('$brand_name', '1')";

                    Database::execute($insert_query);

                    echo "Brand added successfully.";
                }
            } else {
                echo "Brand name should not exceed 45 characters.";
            }
        } else {
            echo "Please enter brand name";
        }
    } else {
        echo "Please enter brand name.";
    }
} else {
    echo "Something went wrong";
}
