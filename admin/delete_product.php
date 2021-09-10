<?php
    $pick=$connect->query("SELECT * FROM product WHERE product_id = '$_GET[id]'");
    $row=$pick->fetch_assoc();

    $connect->query("DELETE FROM product WHERE product_id='$_GET[id]'");
    echo "<script>alert('Product Deleted!')</script>";
    echo "<script>location='index.php?page=inventory';</script>";

?>