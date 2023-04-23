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
    <title>Document</title>
    <link rel="stylesheet" href="slick/slick-theme.css">
    <link rel="stylesheet" href="slick/slick.css">
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
</head>
<body>
    <?php
    include "views/header.php";
    ?>


<section id="best-sellers">
<div id="mainphoto">
    <div id="mainphototext">
    <h1>Do you want to see our new products?</h1>
    <a href="<?=$BASE_URL?>/all-items.php">Just click <span class="bold">here</span></a>
    </div>
    <img src="images/banner.jpg" alt="">
</div>
<div id="bestheader">
<H1>Best-sellers</H1>
</div>
<div id="bestblogs" >
    
<?php

               $products_best_query = mysqli_query($conn, "SELECT * FROM products WHERE hit >0");
               while ($row = mysqli_fetch_assoc($products_best_query)) {
                echo '
                <div class="items-blocks">
                <img class="items-blocks-img" src="'.$row["image"].'" alt="">
                <h3>'.$row["title"].'</h3>
                <p>'.$row["content"].'</p>
                <p>'.$row["price"].'</p>
                <a href="all-items.php">Buy now</a>
                </div>';

             }

?>


</div>
</section>




<div id="promo-blog">
    <div id="promo-text">
        <h3>Essence Hello, Good Stuff!</h3>
    <p> Face Serum is a facial serum that should absolutely not be missing from your stash. This serum guarantees you a beautiful and radiant complexion. The formula is silicone-free with pineapple extract. Furthermore, this serum consists of 97% natural ingredients and provides intense hydration. The end result is a beautiful shine and a delicious pineapple scent.
</p>
</div>
<div id="promo-video">
<video controls src="videos/promo.mp4"></video>
</div>
</div>



<div id="sale">
    
<h2>Sale 40%</h2>

<div  class="sale-block">
<?php

               $products_best_query = mysqli_query($conn, "SELECT * FROM products WHERE sale >0");
               while ($row = mysqli_fetch_assoc($products_best_query)) {
                echo '
                <div class="sale-blocks ">
                <a href="all-items.php"><img class="sale-blocks-img" src="'.$row["image"].'" alt=""></a>
                <h3>'.$row["title"].'</h3>
                <p>'.$row["price"].'</p>
                </div>';

             }

?>
<div class="sale-button">
             <a href="<?=$BASE_URL?>/all-items.php">Buy now</a>

</div>
</div>

</div>







<footer id="footer">
    <div class="footer-menu">
    <h3>Menu</h3>
    <ul class="list">
        <li><a href="<?=$BASE_URL?>/profile.php">Account</a></li>
        <li> <a href="<?=$BASE_URL?>/all-items.php">All items</a></li>
        <li><a href="<?=$BASE_URL?>/all-items.php">Shop cart</a></li>
    </ul>

    </div>
    <div class="footer-menu">
    <h3>MySunnyShop</h3>
    <ul class="list">
        <li><a href="<?=$BASE_URL?>/sale.php">About us</a></li>
        <li> <a href="">Shop history</a></li>
        <li><a href="">Privacy Policy</a></li>
        <li><a href="">Careers</a></li>
        <li><a href="">Help</a></li>

    </ul>


    </div>
    <div class="footer-menu">
    <h3>Get in Touch</h3>
    <ul class="list">
        <li><a href="">How can you find us?</a></li>
        <li> <a href="<?=$BASE_URL?>/contacts.php">Contacts</a></li>
   
    </ul>
    <div class="logos">
        <a href="mailto:admin@hipolink.net"><img src="images/logos/google_icon.svg" alt=""></a>
        <a href=""><img src="images/logos/4202090_instagram_logo_social_social media_icon.svg" alt=""></a>
        <a href=""><img src="images/logos/5296500_fb_social media_facebook_facebook logo_social network_icon.svg" alt=""></a>
    
    </div>
    </div>
    
</footer>




<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="scripts/slider.js"></script> 
</body>


</body>
</html>