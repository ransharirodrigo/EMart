<?php

include "../../libs/connection.php";

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password = $_POST["password"];

if (empty($first_name)) {
    echo ("Please fill your First Name");
} else if (strlen($first_name) > 50) {
    echo ("First Name must contain lower than 50 characters");
} elseif (empty($last_name)) {
    echo ("Please fill your Last Name");
} elseif (strlen($last_name) > 50) {
    echo ("Last Name must contain lower than 50 characters");
} elseif (empty($mobile)) {
    echo ("Please enter your Mobile Number");
} elseif (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}$/", $mobile)) {
    echo ("Please enter a valid Mobile Number");
} else {

    $user_resultset = Database::execute("SELECT * FROM `user` WHERE `email`='$email'");


    if ($user_resultset->num_rows == 1) {

        $query = "UPDATE `user` SET `first_name`='$first_name',`last_name`='$last_name',`mobile`='$mobile'";

        if (!empty($password)) {
            if (strlen($password) < 8 || strlen($password) > 50) {
                echo ("Your password must contain between 8 to 50 characters");
            } else {

                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                $query .= ",`password`='$hashed_password'";
            }
        }


        $query .= " WHERE `email`='$email'";

        Database::execute($query);


        if (isset($_FILES["image_file"])) {


            $image_extension = $_FILES["image_file"]["type"];
            $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

            if (in_array($image_extension, $allowed_image_extensions)) {


                $new_img_extension;

                if ($image_extension == "image/jpeg") {
                    $new_img_extension = ".jpeg";
                } else if ($image_extension == "image/png") {
                    $new_img_extension = ".png";
                } else if ($image_extension == "image/svg+xml") {
                    $new_img_extension = ".svg";
                }

                $file_name = "../../assets/img/profile_images//" . $first_name . "_" . uniqid() . $new_img_extension;

                move_uploaded_file($_FILES["image_file"]["tmp_name"], $file_name);

                $user_profile_image_resultset = Database::execute("SELECT * FROM `profile_image` WHERE `user_email`='$email'");

                if ($user_profile_image_resultset->num_rows == 1) {
                    Database::execute("UPDATE `profile_image` SET `image_path`='$file_name'");
                    echo ("success");
                } else if ($user_profile_image_resultset->num_rows == 0) {
                    Database::execute("INSERT INTO `profile_image`(`image_path`,`user_email`) VALUES ('$file_name','$email')");
                    echo ("success");
                }
            } else {
                echo (".jpeg , .png , .svg images are only allowed");
            }
        } else {

            $new_user_details_resultset = Database::execute("SELECT * FROM `user` WHERE `email`='$email'");
            $new_user_details_array = $new_user_details_resultset->fetch_assoc();

            session_start();
            $_SESSION["user"] = $new_user_details_array;
            
            echo ("success");
        }
    } else {
        echo ("Something went wrong");
    }
}
