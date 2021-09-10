
<?php 
    session_start();
    $connect = new mysqli("localhost","root","","yans_store");

    if(empty($_SESSION["shopping_cart"]) OR !isset($_SESSION["shopping_cart"])){
        echo "<script>alert('Your cart is empty, please add some product to buy!')</script>";
        echo "<script>location='index.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Yans-Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    
</head>

<body>
    <div class="top-nav-bar">
        <div class="search-box">
            <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
            <a href="index.php"> <img src="logo/logo1-.png" class="logo"></a>
            <input type=text class="form-control">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
        <div class="menu-bar">
            <ul>
                <li><a href="signout.php?page=signout">Sign Out</a></li>
            </ul>
            <div>
            </div>
        </div>
    </div>
    
    <h2 style="margin-left: 200px;">Shopping Cart</h2>
    <div class="table-bordered" style="margin: 15px 0px 0px 200px; width:70%;">
        <table class="table table-hover" style="margin-bottom: 0px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Total Product</th>
                    <th>Total</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <?php $number=1; ?>
                <?php $order_total = 0;?>
                <?php $order_id=1; ?>
                <?php foreach ($_SESSION['shopping_cart'] as $product_id => $total_product): ?>
                <?php
                    $pick = $connect->query("SELECT * FROM product WHERE product_id='$product_id'"); 
                    $row=$pick->fetch_assoc();
                    $total = $row["product_price"]*$total_product;
                ?>
                    <tr>
                        <th><?php echo $number; ?></th>
                        <th><?php echo $row['product_name']; ?></th>
                        <th>$<?php echo number_format ($row['product_price']); ?></th>
                        <th><?php echo $total_product ?></th>
                        <th>$<?php echo number_format ($total) ?></th>
                        <th>
                            <a href="delete_cart.php?id=<?php echo $row['product_id']; ?>" class="btn-danger btn">Delete</a>
                        </th>
                    </tr>
                    
                <?php $number++; ?>
                <?php $order_total += $total; ?>
                <?php endforeach ?>
                

            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">Order Total</th>
                    <th colspan="2">$<?php echo number_format($order_total)?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <a href="index.php" class="btn btn-primary" style="margin-left:200px; margin-top: 12px">Back to Shopping</a>
    <a href="checkout.php" class="btn btn-primary" style="margin-left:10px; margin-top: 12px">Checkout</a>
    

</body>
</html>

