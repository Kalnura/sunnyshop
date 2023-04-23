<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "sunnyshop";

$conn =  new mysqli($servername, $username, $password, $database);

if (!$conn) {
    echo "Connection SH failded: " . mysqli_connect_error();
    exit();
}

// $name="Kalnur";
// $pass=sha1("abc");
// mysqli_query($conn,"INSERT INTO users (email,full_name,password,city, address)
//                     VALUES ('abc', '$name','$pass','Almaty','Baker street,25')");


?>