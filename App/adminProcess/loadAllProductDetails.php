<?php
include "../../libs/connection.php";

$products_resultset = Database::execute("SELECT `product`.`product_id` AS product_id,
`product`.title AS product_title,
product.description AS product_description,
product.date_added AS date_added,
product.points AS points,
product.price AS price,
product.delivery_fee_colombo AS delivery_fee_colombo,
product.delivery_fee_other AS delivery_fee_other,
product.qty AS product_qty,
color.color_id AS product_color_id,
color.color_name AS product_color,
category.category_id AS category_id,
brand.brand_id AS brand_id,
`status`.`status_id` AS product_status_id,
`status`.`status` AS product_status,
model.model_id AS product_model_id,
model.model_name AS product_model_name FROM emart_db.product
INNER JOIN emart_db.color ON product.color_color_id=color.color_id 
INNER JOIN emart_db.category ON category.category_id=product.category_category_id
INNER JOIN emart_db.brand ON product.brand_brand_id=brand.brand_id 
INNER JOIN `status` ON product.status_status_id=`status`.status_id 
INNER JOIN model ON model.model_id=product.model_model_id ORDER BY `product`.`product_id` ASC");

if ($products_resultset->num_rows > 0) {

    for ($i = 0; $i < $products_resultset->num_rows; $i++) {
        $product_data = $products_resultset->fetch_assoc();
?>

        <tr onclick="productViewPopUp(
            '<?php echo $product_data['product_id'] ?>',
            '<?php echo $product_data['product_title'] ?>',
            '<?php echo $product_data['product_description'] ?>',
            '<?php echo $product_data['date_added'] ?>',
            '<?php echo $product_data['points'] ?>',
            '<?php echo $product_data['price'] ?>',
            '<?php echo $product_data['delivery_fee_colombo'] ?>',
            '<?php echo $product_data['delivery_fee_other'] ?>',
            '<?php echo $product_data['product_color_id'] ?>',
            '<?php echo $product_data['product_color'] ?>',
            '<?php echo $product_data['category_id'] ?>',
            '<?php echo $product_data['brand_id'] ?>',
            '<?php echo $product_data['product_status_id'] ?>',
            '<?php echo $product_data['product_model_id'] ?>',
                  '<?php echo $product_data['product_qty'] ?>'
            )" class="tableRow">
            <td><?php echo $product_data['product_id'] ?></td>
            <td><?php echo $product_data['product_title'] ?></td>
            <td><?php echo $product_data['product_status'] ?></td>
            <td>RS <?php echo $product_data['price'] ?></td>
        </tr>
<?php
    }
}
