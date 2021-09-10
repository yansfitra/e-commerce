<?php 
    session_start();
    $product_id = $_GET['id'];
    if(isset($_SESSION['shopping_cart'][$product_id])){
        $_SESSION['shopping_cart'][$product_id]+=1;
    }
    else{
        $_SESSION['shopping_cart'][$product_id]=1;
    }
    echo "<script>alert('Product already added in the shopping cart')</script>";
    echo "<script>location='shopping_cart.php';</script>";     
?>