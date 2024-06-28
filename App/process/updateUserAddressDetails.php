<?php

include "../../libs/connection.php";

$email = $_POST["email"];
$addressNo = $_POST["addressNo"];
$addressLine1 = $_POST["addressLine1"];
$addressLine2 = $_POST["addressLine2"];
$district_id = $_POST["district"];

// Address details update or insert
if (isset($_POST["addressNo"]) && isset($_POST["addressLine1"]) && isset($_POST["addressLine2"])) {

    //  address values
    $address_no = trim($_POST["addressNo"]);
    $address_line1 = trim($_POST["addressLine1"]);
    $address_line2 = trim($_POST["addressLine2"]);

    // Check if at least one address field is not empty
    if (!empty($address_no) && !empty($address_line1) && !empty($address_line2) && $district_id != 0) {

        $user_has_address_result = Database::execute("SELECT * FROM user_has_address WHERE `user_email` = '$email'");

        if ($user_has_address_result->num_rows > 0) {
            Database::execute("UPDATE user_has_address SET `no` = '$address_no', `line1` = '$address_line1', `line2` = '$address_line2',`district_id`='$district_id' WHERE `user_email` = '$email'");
        } else {
            Database::execute("INSERT INTO user_has_address (`user_email`, `no`, `line1`, `line2`,`district_id`) VALUES ('$email', '$address_no', '$address_line1', '$address_line2','$district_id')");
        }
        echo "Address details updated successfully.";
    } else {
        echo "Fill No, Line 1, and Line 2 fields and choose the district to update address details.";
    }

}
