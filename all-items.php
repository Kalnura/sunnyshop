<?php
session_start();
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
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
</head>
<body >
<?php
    include "views/header.php"
?>
       <div class="all-items">
      
      <h1>All products</h1> 
  
  
      <form method="POST" class="product-filter" name="filter" action="all-items.php">
    <label for="product_brand">Product Brand</label>
    <select name="product_brand" id="product_brand">
      <?php
      $products_query = mysqli_query($conn, "SELECT DISTINCT product_brand FROM products");
      while ($row = mysqli_fetch_assoc($products_query)) {
        echo '<option value="' . $row["product_brand"] . '">' . $row["product_brand"] . '</option>';
      }
      ?>
    </select>
  
    <button type="submit">Filter</button>
  </form>
  
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_brand = $_POST["product_brand"];
    $sql = mysqli_query($conn,"SELECT * FROM products WHERE product_brand = '$selected_brand'");
  } else {
    $sql = mysqli_query($conn,"SELECT * FROM products");
  }
  $totalRows = mysqli_num_rows($sql);
  $rowsPerPage = 9;
  $totalPages = ceil($totalRows / $rowsPerPage);
  $iCurr = (empty($_GET['page']) ? 1 : intval ($_GET['page']));
  $offset = ($iCurr - 1) * $rowsPerPage;
  
  if (empty($selected_brand)) {
    $result = mysqli_query($conn, "SELECT * FROM products LIMIT $offset, $rowsPerPage");
  } else {
    $result = mysqli_query($conn, "SELECT * FROM products WHERE product_brand = '$selected_brand' LIMIT $offset, $rowsPerPage");
  }
  ?>
  <div class="all-items-main-block">
  
  <?php
  
  if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<form method="post" class="all-items-blocks" action="' . $BASE_URL .'/cart.php?action=add&id='.$row["id"].'">
      
       <img class="all-items-blocks-image" src="'.$row["image"].'" alt="">
       <p>'.$row["content"].'</p>
       <h3>'.$row["title"].'</h3>
       <p>'.$row["price"].'</p>
       <p>'.$row["product_brand"].'</p>
       <p>'.$row["category_name"].'</p>
  
       <input type="text" name="quantity" class="form-control" value="1">
       <input class="hidden"type="hidden" name="title" value='.$row["title"].'>
       <input  class="hidden" type="hidden" name="price" value='.$row["price"].'>
       <input class="submit" type="submit" name="add"  class="btn btn-success" value="Add to Cart">
       <p>'.$row["type"].'</p>
       </form>';
    }
  } else {
    echo "No products found.";
  }
   
  mysqli_close($conn);
  ?>
  </div>
  <div class="pagination">
  <?php
    for($i = 1; $i <= $totalPages; $i++) {
      if($iCurr == $i) {
        echo "<div class='pag-a'>
              <b><a  href=all-items.php?page=$i>$i</a><b>
              </div>";
      } else {
        echo "<div class='pag-a'>
              <a  href=all-items.php?page=$i>$i</a>
              </div>";     
      }
    }
  ?>
  </div>
  
</body>
</html>