<?php
include "config/base_url.php";
include "config/db.php";
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
    <title>Document</title>
    
</head>
<body>
<?php
    include "views/header.php"
?>

<section>
<div id="bestp-banner">
<img src="images/spring-sale-floral-frame-social-media-post-template_47987-14928.avif" alt="">
</div>
<h1 class="header-con">Our Best products</h1>

<div class="all-items-main-block background">
<?php

               $products_best_query = mysqli_query($conn, "SELECT * FROM products WHERE hit >0");
               while ($row = mysqli_fetch_assoc($products_best_query)) {
                echo '
                <div class="items-blocks">
                <img class="items-blocks-img" src="'.$row["image"].'" alt="">
                <h3>'.$row["title"].'</h3>
                <p>'.$row["price"].'tg</p>
                </div>';

             }

?>
</div>
</section>

</body>
</html>