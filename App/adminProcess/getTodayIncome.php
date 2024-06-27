<?php
include "../../libs/connection.php";

$today_date = date("Y-m-d");

$today_income_resultset = Database::execute("SELECT SUM(total) as today_income FROM invoice WHERE `date_time` LIKE '$today_date%'");

$today_income = $today_income_resultset->fetch_assoc();

echo ($today_income["today_income"]);
