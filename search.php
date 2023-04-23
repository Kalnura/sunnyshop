<?php 
session_start();
include "config/base_url.php";
include "config/db.php";


if (isset($_POST["search_text"]) && strlen($_POST["search_text"]) > 0) {
    $search_text = $_POST["search_text"];
} else {
    header("Location: $BASE_URL");
}
 





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
    <link rel="stylesheet" href="styles/all.css">
</head>
<body>
    <?php
    include "views/header.php";
    ?>

    <div class="all-items">
    <div class="search-for">
    <h2 class="search-header">All products</h2>

    <span><h2 class="search-header">Search for:</h2></span>
            <span><?=$search_text?></span>
        </div>
        <div class="all-items-main-block">


                <?php
                               
$products_query = mysqli_query($conn, "SELECT * FROM products");
$totalRows=mysqli_num_rows($products_query);
$rowsPerPage=9;
$totalPages=ceil($totalRows/ $rowsPerPage);
$iCurr=(empty($_GET['page'])?1 : intval ($_GET['page']));
$offset=($iCurr-1)* $rowsPerPage;
                $products_query = mysqli_query($conn, "SELECT * 
                                                    FROM products 
                                                    WHERE title LIKE '%$search_text%' OR content LIKE '%$search_text%'
                                                    LIMIT $offset, $rowsPerPage");

                if (mysqli_num_rows($products_query) == 0) {
                    echo '<h2 class="no_blogs">No products</h2>';
                } else {
                    while ($row = mysqli_fetch_assoc($products_query)) {
                
                        echo '<div class="all-items-blocks">
                        <img class="all-items-blocks-image" src="'.$row["image"].'" alt="">
                        <div class="text-items">
                        <h3>'.$row["title"].'</h3>
                      <p>'.$row["content"].'</p>
                      <p>'.$row["price"].'</p>
                      </div>

                        <a class="shop-now"  data-id='.$row["id"].' href= "all-items.php?'.$row["id"].'">Buy now</a>

                        </div>';

                     }
                    }
                ?>
             </div>
    
             
               
            </div>

            <div class="pagination">
                <?php
                $num_rows = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM products
                                                                 WHERE title LIKE '%$search_text%' OR content LIKE '%$search_text%'"));
        
                for ($i = 1; $i <= ceil($totalPages); $i++) {
                    $pag_href = "$BASE_URL/search.php?page=$i";

                    ?>
                    <form action="<?=$BASE_URL?>/search.php?page=<?=$i?>" method="POST">
                        <input class="hidden-input" type="text" name="search_text" value="<?=$search_text?>">
                        <?php if ($iCurr == $i) { ?>

                            <button type="submit" class="pag-a"><?=$i?></button>

                        <?php } else {  ?>

                            <button type="submit" class="pag-a"><?=$i?></button>

                        <?php }  ?>
                    </form>
                <?php
                }
                ?>
        </div>	
        
        </div>

</body>
</html>