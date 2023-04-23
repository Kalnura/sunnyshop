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
    <h2 class="header-con">3 ways to contact us</h2>
<section id="contact-section">
    
    
    <div id="contact">
  
        <div class="contact-blog">

            <img src="images/chat.png" alt="">
            <h3>Live Chat</h3>
            <p>Managers are available::</p>
            <p>Monday - Friday </br>9 AM - 6 PM EST</p>
            <p>Saturday and Sunday </br>10 AM - 4 PM EST</p>
        </div>

        <div  class="contact-blog">
        <img src="images/phone.png" alt="">
            <h3>Call US</h3>
            <p>You can also contact us by (+8) 9999</p>
            <p>Monday - Friday </br>9 AM - 6 PM EST</p>
<p>Saturday and Sunday</br>9 AM - 6PM EST</p>
        </div>

        <div  class="contact-blog">
            <img src="images/email.png" alt="">
            <h3>E-Mail</h3>
            <p>Whenever you like.</p>
            <p> And wherever </br> Our clients are our diamonds</p>
            <p>We'll wait for your questions</p>
            

            <p> We will try to answer as soon as possible</p>
        </div>
    </div>
</section>

</body>
</html>