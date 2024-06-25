<?php
include "../../libs/connection.php";

$brand_resultset = Database::execute("SELECT * FROM `brand` INNER JOIN `status` ON `brand`.`status_status_id`=`status`.`status_id`");

if ($brand_resultset->num_rows > 0) {

    for ($i = 0; $i < $brand_resultset->num_rows; $i++) {
        $brand_data = $brand_resultset->fetch_assoc();
?>
        <tr  class="tableRow" onclick="brandViewPopUp(
            '<?php echo $brand_data['brand_id']?>',
            '<?php echo $brand_data['brand_name']?>',
            '<?php echo $brand_data['status_id']?>'
        )">
            <td>  <?php echo $brand_data["brand_id"]?></td>
            <td><?php echo $brand_data["brand_name"]?></td>
            <td><?php echo $brand_data["status"]?></td>
        </tr>
<?php
    }
}
