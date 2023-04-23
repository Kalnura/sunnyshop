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
	<title>Профиль</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">

</head>
<body>

<?php include "views/header.php" ?>
<section class="profile-page">
	<div class="info-menu">
		<div id="info-menu-img">
		<img src="images/profile.jpg" alt="">

		</div>
		<div class="page-header">
			<h3>Welcome,<?=$_SESSION["full_name"]?></h3>
		</div>
		<div class="dropdown">
			<a href="<?=$BASE_URL?>/edit-profile.php" class="button">Change information</a>
			<a href="<?=$BASE_URL?>/orderhistory.php" class="button">My orders</a>
			<a href="<?=$BASE_URL?>/myaddresses.php" class="button">My addresses</a>
			<a href="<?=$BASE_URL?>/privacy.php" class="button">Privacy Policy</a>
		</div>
		</div>


		<div class="form">
				
					<h3>My information</h3>
				<p class="bold" >Full name:</p>
				<p><?=$profile['full_name']?></p>
				<p class="bold">Email:</p>
				<p><?=$profile['email']?></p>

				<p class="bold">City:</p>
				<p> <?=$profile['city']?></p>

				<p class="bold">Address:</p>
				<p><?=$profile['address']?></p>
		
	    </div>
</section>	
</body>
</html>