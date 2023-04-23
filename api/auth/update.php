<?php
session_start();
include "../../config/db.php";
include "../../config/base_url.php";

$user_id = $_SESSION["id"];

if (isset($_POST["email"], $_POST["full_name"], $_POST["address"], $_POST["city"]) &&
    strlen($_POST["email"]) > 0 && strlen($_POST["full_name"]) > 0 
    && strlen($_POST["address"]) > 0 && strlen($_POST["city"]) > 0) {

    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $address = $_POST["address"];
    $city = $_POST["city"];

    $profile_query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $profile_result = mysqli_fetch_assoc($profile_query);
    if (mysqli_num_rows($profile_query) == 0 || $_SESSION["email"] == $email) {
    

        mysqli_query($conn, "UPDATE users
                             SET email='$email', full_name='$full_name', address='$address', city='$city'
                             WHERE id=$user_id");

        $_SESSION["email"] = $email;
        $_SESSION["full_name"] = $full_name;
        $_SESSION["address"] = $address;
        $_SESSION["city"] = $city;


        header("Location: $BASE_URL/profile.php");

    } else {
        header("Location: $BASE_URL/edit-profile.php?error=2");
    }

} else {
    header("Location: $BASE_URL/edit-profile.php?error=1");
}

?> 