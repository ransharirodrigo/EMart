<?php

include "../../libs/connection.php";

$top_selling_item_result = Database::execute("SELECT `product`.`product_id` AS `product_id`, `product`.`title` AS `title` , `top_selling_items`.`qty` AS `top_selling_items_qty` FROM `top_selling_items` LEFT JOIN `product` ON `product`.`product_id`=`top_selling_items`.`product_product_id` ORDER BY `top_selling_items_qty` DESC LIMIT 20 ");

if ($top_selling_item_result->num_rows > 1) {
    for ($i = 0; $i < $top_selling_item_result->num_rows; $i++) {
        $top_selling_item_data = $top_selling_item_result->fetch_assoc();
?>
        <tr>
            <td><?php echo $top_selling_item_data["product_id"] ?></td>
            <td><?php echo $top_selling_item_data["title"] ?></td>
            <td><?php echo $top_selling_item_data["top_selling_items_qty"] ?></td>
        </tr>
<?php

    }
}
