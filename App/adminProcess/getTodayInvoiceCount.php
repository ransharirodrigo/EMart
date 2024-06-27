<?php
include "../../libs/connection.php";

$today_date = date("Y-m-d");

$today_invoice_resultset = Database::execute("SELECT COUNT(total) as today_invoice_count FROM invoice WHERE `date_time` LIKE '$today_date%'");

$today_invoice_data = $today_invoice_resultset->fetch_assoc();

echo ($today_invoice_data["today_invoice_count"]);
