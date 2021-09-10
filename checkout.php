<?php 
    session_start();
    $connect = new mysqli("localhost","root","","yans_store");

    if(!isset($_SESSION["user"])){
        echo "<script>alert('Please Login!'); </script>";
        echo "<script>location='login2.php'; </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Yans-Checkout</title>
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
    
    <h2 style="margin-left: 200px;">Checkout</h2>
    <div style="margin: 15px 0px 0px 200px; width:70%;">
        <table style="margin-bottom: 0px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Total Product</th>
                    <th>Total</th>
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
                    </tr>
                    
                <?php $number++; ?>
                <?php $order_total += $total; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Order Total</th>
                    <th>$<?php echo number_format($order_total)?></th>
                </tr>
            </tfoot>
        </table>
        <br>
        <br>
        <form method = "POST">
            <table style="border:none;">
                <thead style="border:none;">
                    <tr style="border:none;">
                        <th style="border:none;">Name</th>
                        <th style="border:none;"><input type="text"; disabled value="<?php echo $_SESSION['user']['username'] ?>"></th>
                    </tr>
                </thead>
                <tbody>   
                    <tr style="border:none;">
                        <th style="border:none;">Alamat</th>
                        <th style="border:none;"><textarea rows="4" cols="50" name ="address_user" disabled ><?php echo $_SESSION['user']['address']; ?></textarea></th>
                    </tr>   
                    <tr style="border:none;">
                        <th style="border:none;">Phone Number</th>
                        <th style="border:none;"><input type="text"; disabled value="<?php echo $_SESSION['user']['phone'] ?>"></th>
                    </tr>   
                </tbody>
            </table>
            <br>
            <button class ="btn btn-primary" name ="checkout">checkout</button>
            
        </form>
    </div>

    <?php 
    if(isset($_POST["checkout"])){
        $user_id = $_SESSION["user"]["user_id"];
        $date = date("Y-m-d");
        $address = $_SESSION['user']['address'];
        
        $connect->query("INSERT INTO sales (user_id, date, order_total, address)
                    VALUES ('$user_id', '$date', '$order_total', '$address')");
        
        echo "<script>alert('Checkout Succeed!')</script>";
        echo "<script>location='index.php'</script>";
    }
    ?>

</body>
</html>

