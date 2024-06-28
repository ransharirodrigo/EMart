<?php

session_start();
include "../../libs/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION["admin"]["email"];
    $currentPassword = trim($_POST["currentPassword"]);
    $newPassword = trim($_POST["newPassword"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    if (empty($currentPassword)) {
        echo "Current password is required.";
    } else if (empty($newPassword)) {
        echo "New password is required.";
    } else if (empty($confirmPassword)) {
        echo "Confirm password is required.";
    } else if ($newPassword !== $confirmPassword) {
        echo "New password and confirm password do not match.";
    } else {
        $query = "SELECT `password` FROM `user` WHERE email = '$email'";
        $resultset = Database::execute($query);

        if ($resultset && $resultset->num_rows > 0) {
            $data = $resultset->fetch_assoc();
            $hashedPassword = $data["password"];

            if (password_verify($currentPassword, $hashedPassword)) {
                $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);

                $updateQuery = "UPDATE `user` SET `password`= '$newPasswordHash' WHERE email = '$email'";
                $updateResult = Database::execute($updateQuery);

                if ($updateResult) {
                    echo "Password changed successfully.";
                } else {
                    echo "Failed to update the password.";
                }
            } else {
                echo "Current password is incorrect.";
            }
        } else {
            echo "Admin not found.";
        }
    }
} else {
    echo "Something Went Wrong. Please try again";
}
