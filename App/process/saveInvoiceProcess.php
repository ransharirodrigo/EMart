<?php
include "../../libs/connection.php";

session_start();

if (isset($_SESSION["user"])) {

    $orderId = $_POST["orderId"];
    $product_id = trim($_POST["product_id"]);
    $userEmail = $_POST["userEmail"];
    $total = $_POST["total"];
    $quantity = $_POST["quantity"];


    $product_resultset = Database::execute("SELECT * FROM `product` WHERE `product_id`='$product_id' ");
    $product_data = $product_resultset->fetch_assoc();

    $current_quantity = $product_data["qty"];
    $new_quantity = $current_quantity - $quantity;


    Database::execute("UPDATE `product` SET `qty`='$new_quantity' WHERE `product_id`='$product_id'");

    $date = new DateTime();

    $timezone = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($timezone);

    $dateTime = $date->format("Y-m-d H:i:s");

    $onlyDate = $date->format("Y-m-d");



    Database::execute("INSERT INTO `invoice` (`invoice_id`,`date_time`,`total`,`user_email`) VALUES ('$orderId','$dateTime','$total','$userEmail')");
    Database::execute("INSERT INTO `invoice_item` (`invoice_invoice_id`,`product_product_id`,`qty`) VALUES ('$orderId','$product_id','$quantity')");


    $topsellingResultset = Database::execute("SELECT * FROM `top_selling_items` WHERE `date_time` LIKE '$onlyDate %' AND `product_product_id`='$product_id'");

    if ($topsellingResultset->num_rows == 1) {
        Database::execute("UPDATE `top_selling_items` SET `qty`=`qty`+  $quantity WHERE `date_time` LIKE '$onlyDate %' AND `product_product_id`='$product_id'");
    } else {
        Database::execute("INSERT INTO `top_selling_items`(`qty`,`date_time`,`product_product_id`) VALUES ('$quantity','$dateTime','$product_id')");
    }

    echo ("success");
}
