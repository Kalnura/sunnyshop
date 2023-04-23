<?php
session_start();
include "config/base_url.php";
include "config/db.php";

$user_id = $_SESSION["id"];

$profile_details_query = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$profile = mysqli_fetch_assoc($profile_details_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change information</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
</head>
<body>
<?php include "views/header.php" ?>

	<section class="change-info">
	<div class="page-header">
				<h2 class="header-con">My information</h2>
			</div>
			
			<form class="form" action="<?=$BASE_URL?>/api/auth/update.php" method="POST" enctype="multipart/form-data">

				<p>Full name</p>
				<input class="input" type="text" name="full_name" placeholder="Full name" value="<?=$profile['full_name']?>">

				<p>Email</p>
				<input class="input" type="text" name="email" placeholder="Email" value="<?=$profile['email']?>">
				
				<p>City</p>
				<input class="input" type="text" name="city" placeholder="city" value="<?=$profile['city']?>">

					
                <p >Address</p>
				<input class="input" type="text" name="address" placeholder="Address" value="<?=$profile['address']?>">

				<button type="submit">Save information</button>

		
		</div>

	</section>
	
</body>
</html>
