<?php

include "../../libs/connection.php";

$product_model_resultset = Database::execute("SELECT * FROM `model`");

if ($product_model_resultset->num_rows > 0) {
    for ($i = 0; $i < $product_model_resultset->num_rows; $i++) {
        $product_model_data = $product_model_resultset->fetch_assoc();

?>
        <option value="<?php echo $product_model_data["model_id"] ?>"> <?php echo $product_model_data["model_name"] ?> </option>
<?php

    }
}
