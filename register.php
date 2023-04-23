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
    <title>Регистрация</title>
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
</head>
<body>
    <?php
    include "views/header.php";
    ?>

    <section id="signin">
        <h1>Sign up</h1>
        <form class="sign-form " action="<?=$BASE_URL?>/api/auth/signup.php" method="POST">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="full_name" placeholder="Name">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="re_password" placeholder="Repeat your password">
            <button type="submit">Sign up</button>
            <?php
            if (isset($_GET["error"]) && $_GET["error"] == 1) {
                echo '<p class="text-danger">Ваши данные не валидны</p>';
            } else if (isset($_GET["error"]) && $_GET["error"] == 2) {
                echo '<p class="text-danger">Email уже зарегистрирован!</p>';
            } else if (isset($_GET["error"]) && $_GET["error"] == 3) {
                echo '<p class="text-danger">Пароли не совпадают</p>';
            }
            ?>
        </form>
    </section>
</body>
</html>



