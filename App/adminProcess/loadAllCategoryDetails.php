<?php
include "../../libs/connection.php";

$category_resultset = Database::execute("SELECT * FROM `category` INNER JOIN `status` ON `category`.`status_status_id`=`status`.`status_id`");

if ($category_resultset->num_rows > 0) {

    for ($i = 0; $i < $category_resultset->num_rows; $i++) {
        $category_data = $category_resultset->fetch_assoc();
?>
        <tr class="tableRow" onclick="categoryViewPopUp(
           '<?php echo $category_data['category_id'] ?>',
           ' <?php echo $category_data['category_name'] ?>',
           '<?php echo $category_data['status_status_id'] ?>',
           '<?php echo $category_data['category_img'] ?>'
        )">
            <td> <?php echo $category_data["category_id"] ?></td>
            <td><?php echo $category_data["category_name"] ?></td>
            <td><?php echo $category_data["status"] ?></td>
        </tr>
<?php
    }
}
