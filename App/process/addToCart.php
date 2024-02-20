<?php

include "../../libs/connection.php";

$product_id = $_GET["product_id"];


session_start();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    
} else {
    echo "Login First";
}
