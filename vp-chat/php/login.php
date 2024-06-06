<?php
session_start();
include_once "config.php";
require_once "encrypt.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $email = encrypt($email);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $user_pass = encrypt($password);
            $enc_pass = $row['password'];
            if ($user_pass === $enc_pass) {
                $status = "Active";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                } else {
                    echo "Error!! Please try again!";
                }
            } else {
                echo "Email or Password is Incorrect!";
            }
        } else {
            echo "This email not Exist, please register your account";
        }
    } else {
        echo "enter valid email";
    }
} else {
    echo "All input fields are required!";
}
