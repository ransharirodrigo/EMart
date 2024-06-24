<?php

include "../../libs/connection.php";

$brand_resultset = Database::execute("SELECT * FROM `brand`");

if ($brand_resultset->num_rows > 0) {
    for ($i = 0; $i < $brand_resultset->num_rows; $i++) {
        $brand_data = $brand_resultset->fetch_assoc();

?>
        <option value="<?php echo $brand_data["brand_id"] ?>" <?php echo $brand_data["status_status_id"] == 2 ? 'disabled' : ''; ?>> <?php echo $brand_data["brand_name"] ?> </option>
<?php

    }
}
