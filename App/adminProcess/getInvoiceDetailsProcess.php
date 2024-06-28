<?php

include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['type'])) {

        $type = $_GET['type'];
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];

        if ($type == 'all') {
            $query = "SELECT * FROM invoice";

            if ($start_date != 0 && $end_date == 0) {
                $query .= " WHERE `date_time` >= '$start_date';";
            } elseif ($start_date == 0 && $end_date != 0) {
                $query .= " WHERE `date_time` <= '$end_date'";
            } elseif ($start_date != 0 && $end_date != 0) {
                $query .= " WHERE `date_time` BETWEEN '" . $start_date . " 00:00:00" . "' AND '" . $end_date . " 23:59:59" . "'";
            }
        } elseif ($type == 'today') {

            $date = new DateTime();
            $timezone = new DateTimeZone("Asia/Colombo");
            $date->setTimezone($timezone);
            $onlyDate = $date->format("Y-m-d");

            $query = "SELECT * FROM invoice WHERE date_time LIKE '$onlyDate%'";
        } else {
            echo "Invalid type.";
            exit;
        }

        $invoiceDetailsResultset = Database::execute($query);

        if ($invoiceDetailsResultset->num_rows > 0) {
            for ($i = 0; $i < $invoiceDetailsResultset->num_rows; $i++) {

                $invoiceDetailsData = $invoiceDetailsResultset->fetch_assoc();

?>
                <tr>
                    <td> <?php echo $invoiceDetailsData["invoice_id"] ?></td>
                    <td><?php echo $invoiceDetailsData["date_time"] ?></td>
                    <td><?php echo $invoiceDetailsData["total"] ?></td>
                    <td><?php echo $invoiceDetailsData["user_email"] ?></td>
                    <td> <img src="../../assets/img/down_arrow.png" alt="download.png" /></td>
                </tr>
<?php
            }
        } else {
        }
    } else {
        echo ("Something went wrong.Please try again");
    }
} else {
    echo ("Something went wrong.Please try again");
}
