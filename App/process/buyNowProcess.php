<?php

include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    session_start();

    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
        $product_id = $_GET["product_id"];
        $quantity = $_GET["quantity"];

        $array;
        $order_id = uniqid();

        $product_resultset = Database::execute("SELECT * FROM `product` WHERE `product_id`='$product_id'");
        $product_data = $product_resultset->fetch_assoc();

        $address_resultset = Database::execute("SELECT * FROM `user_has_address` INNER JOIN `district` ON `district`.`id`=`user_has_address`.`district_id` WHERE `user_email`='" . $user["email"] . "'");
        $address_data = $address_resultset->fetch_assoc();

        if ($address_resultset->num_rows == 1) {

            $delivery_fee_for_user;

            $delivery_fee_colombo = $product_data["delivery_fee_colombo"];
            $delivery_fee_other = $product_data["delivery_fee_other"];

            $district_id = $address_data["district_id"];

            if ($district_id == 5) {
                $delivery_fee_for_user = $delivery_fee_colombo;
            } else {
                $delivery_fee_for_user = $delivery_fee_other;
            }

            $product_title = $product_data["title"];
            $total = ($product_data["price"] * $quantity) + $delivery_fee_for_user;
            $first_name = $user["first_name"];
            $last_name = $user["last_name"];
            $mobile = $user["mobile"];
            $district = $address_data["district"];

            $merchant_id = "1227436";
            $merchant_secret = "MjY4OTE0Mjc2Njk2NDgyNTgyODEwODk3MzQ2NzIzMzk3MzYyOTA4";
            $currency = "LKR";

            $hash = strtoupper(
                md5(
                    $merchant_id .
                        $order_id .
                        number_format($total, 2, '.', '') .
                        $currency .
                        strtoupper(md5($merchant_secret))
                )
            );

            $array["order_id"] = $order_id;
            $array["product_title"] = $product_title;
            $array["total"] = $total;
            $array["userEmail"] = $user["email"];
            $array["first_name"] = $first_name;
            $array["last_name"] =  $last_name;
            $array["mobile"] = $mobile;
            $array["district"] = $district;
            $array["address"] = $address_data["no"] . "," . $address_data["line1"] . " " . $address_data["line2"];
            $array["merchant_id"] = $merchant_id;
            $array["merchant_secret_id"] = $merchant_secret;
            $array["currency"] = $currency;
            $array["hash"] = $hash;


            echo json_encode($array);
        } else {
            echo ("Please update your address details.");
        }
    } else {
        echo ("Login First");
    }
} else {
    echo ("Something went wrong. Please try again.");
}
