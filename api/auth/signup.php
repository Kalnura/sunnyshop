<?php
session_start();
include "../../config/db.php";
include "../../config/base_url.php";

if (isset($_POST["email"], $_POST["full_name"], $_POST["password"], $_POST["re_password"]) 
    && strlen($_POST["email"]) > 0 && strlen($_POST["password"]) > 0
    && strlen($_POST["full_name"]) > 0 && strlen($_POST["re_password"]) > 0) {

    $email = $_POST["email"]; 
    $full_name = $_POST["full_name"];
    $pass = $_POST["password"]; 
    $re_pass = $_POST["re_password"];

    $user_query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($user_query) == 0) {

        $user_query_result = mysqli_fetch_assoc($user_query);

        if ($pass == $re_pass) {
            $pass = sha1($pass);

            mysqli_query($conn, "INSERT INTO users(email, full_name, password)
                                 VALUES ('$email', '$full_name', '$pass')");

            header("Location: $BASE_URL/login.php");
        } else {
            header("Location: $BASE_URL/register.php?error=3");
        }

    } else {
        header("Location: $BASE_URL/register.php?error=2");
    }
} else {
    header("Location: $BASE_URL/register.php?error=1");
}


?>