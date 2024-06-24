<?php

include "../../libs/connection.php";

$color_resultset = Database::execute("SELECT * FROM `color`");

if ($color_resultset->num_rows > 0) {
    for ($i = 0; $i < $color_resultset->num_rows; $i++) {
        $color_data = $color_resultset->fetch_assoc();

?>
        <option value="<?php echo $color_data["color_id"] ?>" <?php echo $color_data["status_status_id"] == 2 ? 'disabled' : ''; ?>> <?php echo $color_data["color_name"] ?> </option>
<?php

    }
}
