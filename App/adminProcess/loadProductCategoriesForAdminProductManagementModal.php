<?php

include "../../libs/connection.php";

$category_resultset = Database::execute("SELECT * FROM `category`");

if ($category_resultset->num_rows > 0) {
    for ($i = 0; $i < $category_resultset->num_rows; $i++) {
        $category_data = $category_resultset->fetch_assoc();

?>
        <option value="<?php echo $category_data["category_id"] ?>" <?php echo $category_data["status_status_id"] == 2 ? 'disabled' : ''; ?>> <?php echo $category_data["category_name"] ?> </option>
<?php

    }
}
