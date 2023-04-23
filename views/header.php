
<header id="header">
  <a  id="header-logo" href="<?=$BASE_URL?>">SunnyKShop</a>

  <form id="search" action="<?=$BASE_URL?>/search.php" method="POST">
  <?php
        $search_value = isset($_POST["search_text"]) ? $_POST["search_text"] : "";
        ?>
  <input type="text" name="search_text" placeholder="Search for products..."> 
  <button type="submit">
    <img src="images/211818_search_icon.png" alt="">
</button>
  </form>
  <div>
<div id="header-buttons">
<a href="<?=$BASE_URL?>/shopping.php"><img src="images/9027005_shopping_cart_thin_icon.png" alt=""></a>
    <?php
        if (isset($_SESSION["id"])) {
            echo '  <a href="'.$BASE_URL.'/profile.php""><img src="images/2202250_account_avatar_human_man_profile_icon.png" alt="">
            </a>';
          } else {
            echo '
            <div class="header-in">
            <a href="' . $BASE_URL .'/register.php">Sign up</a>
            </div>

            <div class="header-in">
            <a href="' . $BASE_URL . '/login.php">Sign in</a>
            </div>';
        }
        ?>
</div>
</header>


<div id="header-menu">
 
<a href="<?=$BASE_URL?>/all-items.php">All items</a>
<a href="<?=$BASE_URL?>/best-products.php">Best products</a>

<a href="<?=$BASE_URL?>/sale.php">Our concept</a>

<a href="<?=$BASE_URL?>/contacts.php">Contacts</a>
                           

      </div>