<?php
include "../../libs/connection.php";

$products_resultset = Database::execute("SELECT * FROM `product` INNER JOIN `status` ON `product`.`status_status_id`=`status`.`status_id`");

if ($products_resultset->num_rows > 0) {

    for ($i = 0; $i < $products_resultset->num_rows; $i++) {
        $product_data = $products_resultset->fetch_assoc();
?>

        <tr onclick="productViewPopUp()" class="tableRow">
            <td><?php echo $product_data['product_id'] ?></td>
            <td><?php echo $product_data['title'] ?></td>
            <td><?php echo $product_data['status'] ?></td>
            <td><?php echo $product_data['qty'] ?></td>
            <td>RS <?php echo $product_data['price'] ?></td>
        </tr>
<?php
    }
}
