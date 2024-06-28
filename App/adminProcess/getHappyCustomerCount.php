<?php
include "../../libs/connection.php";

$happy_customer_count = Database::execute("SELECT COUNT(DISTINCT `user_email`) as happy_customer_count FROM `invoice`");

$happy_customer_count_data = $happy_customer_count->fetch_assoc();

echo ($happy_customer_count_data["happy_customer_count"]);
