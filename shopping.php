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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">

</head>
<body >
<?php
    include "views/header.php"
?>

<div style="clear: both"></div>
        <h3 class="header-con">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr BGCOLOR="#FDC8F2">
                <th width="30%" >Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["title"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td> <?php echo $value["price"]; ?></td>
                            <td>
                                <?php echo number_format($value["item_quantity"] * $value["price"], 2); ?></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td>            <a href="<?=$BASE_URL?>/all-items.php">Back to the shopping</a>
</td>
                        </tr>
                        <?php
                    }
                ?>
            </table>

        </div>