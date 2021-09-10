<?php 
    session_start();
    $product_id=$_GET["id"];
    unset($_SESSION["shopping_cart"][$product_id]);

    echo "<script> alert('Product deleted!')</script>";
    echo "<script>location='shopping_cart.php' </script>";
?>
