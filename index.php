<?php 
    session_start();
    $connect = new mysqli("localhost","root","","yans_store");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Yans</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
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
                <li>
                    <a href="shopping_cart.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Cart</a>
                </li>
                <li><a href="sign_up2.php">Register</a></li>
                <li><a href="login2.php">Log In</a></li>
                <li><a href="signout.php">Log Out</a></li>
            </ul>
            <div>
            </div>
        </div>
    </div>

    <section class="header">
        <div class="slider" style="margin-left:151px;">
            <div id="slider" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="foto_slider/sale1.jpg" class="d-block w-100" alt="pict 1">
                    </div>
                    <div class="carousel-item">
                        <img src="foto_slider/sale4.jpg" class="d-block w-100" alt="pict 2">
                    </div>
                    <div class="carousel-item">
                        <img src="foto_slider/sale3.jpg" class="d-block w-100" alt="pict 3">
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-bs-target="#slider" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="1"></li>
                    <li data-bs-target="#slider" data-bs-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </section>

    <!--------------------------product------------------>
    <section class="Products">
        <div class="container">
            <div class="title-box" style="margin-top: 30px;">
                <h2>On Sale</h2>
            </div>
            <div class="row">
                <?php $pick=$connect->query("SELECT * FROM product") ?>
                <?php while($every_product=$pick->fetch_assoc()) { ?>
                <div class="col-md-3">
                    <div class="product-top">
                        <img src="foto_product/<?php echo $every_product['product_photo']?>">
                        <div class="overlay-right">
                            <a href="buy.php?id=<?php echo $every_product['product_id']; ?>"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product-botttom">
                        <h3><?php echo $every_product['product_name']; ?></h3>
                        <h5>$<?php echo number_format($every_product['product_price']); ?></h5>
                    </div>
                </div>
                <?php } ?>
    </section>


    <!---------------------------Website Features-------------------->
    <section class="website-features">
        <div class="container">
            <div class="row">
                <div class="col-md-3  feature-box">
                    <img src="logo/ori.jpg">
                    <div class="feature-text">
                        <p><b>100% Original Items</b> are available at company.</p>
                    </div>
                </div>
                <div class="col-md-3  feature-box">
                    <img src="logo/fast_dev.jpg">
                    <div class="feature-text">
                        <p><b>Return within 30 days</b> of receiving your order.</p>
                    </div>
                </div>
                <div class="col-md-3  feature-box">
                    <img src="logo/free_dev.jpg">
                    <div class="feature-text">
                        <p><b>Get free delivery for every</b> order more than price.</p>
                    </div>
                </div>
                <div class="col-md-3  feature-box">
                    <img src="logo/tax.jpg">
                    <div class="feature-text">
                        <p><b>Price tax included</b> Tax 10%</p>
                    </div>
                </div>
    </section>

    <!----------------------Footer-------------------------------------->

    <section class="footer">
        <div class="container">
            
            <p class="copyright">Made with <i class="fa fa-heart-o"></i> by yansfitra</p>
        </div>
    </section>


    <script>
        function openmenu() {
            document.getElementById("side-menu").style.display = "block";
            document.getElementById("menu-btn").style.display = "none";
            document.getElementById("close-btn").style.display = "block";
        }

        function closemenu() {
            document.getElementById("side-menu").style.display = "none";
            document.getElementById("menu-btn").style.display = "block";
            document.getElementById("close-btn").style.display = "none";
        }
    </Script>
</body>
</html>