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
    <title>Sign up</title>
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
</head>
<body>
    <?php
    include "views/header.php"
    ?>
    <section id="signin">
        <h1>Sign in</h1>
    <form  class="sign-form "action="<?=$BASE_URL?>/api/auth/signin.php" method="POST">
          <input type="text" name="email"placeholder="Email">
          <input type="password" name="password" placeholder="Password...">
          <button type="submit">Sign in</button>
          <?php
            if (isset($_GET["error"]) && $_GET["error"] == 1) {
                echo '<p class="text-danger">Ваши данные не валидны</p>';
            } else if  (isset($_GET["error"]) && $_GET["error"] == 2) {
                echo '<p class="text-danger">Неправильный email или пароль</p>';
            } 
            ?>
        </form>
    </section>
</body>
</html>