<?php
include "../../libs/connection.php";

$today = date('Y-m-d');
$tenDaysAgo = date('Y-m-d', strtotime('-10 days', strtotime($today)));

// Query to fetch income data for the last 10 days
$query = "SELECT DATE(date_time) as date, SUM(total) as income FROM invoice WHERE DATE(date_time) BETWEEN '$tenDaysAgo' AND '$today' GROUP BY DATE(date_time)";

$result = Database::execute($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}


echo json_encode($data);


