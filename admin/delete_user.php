<?php
    $pick=$connect->query("SELECT * FROM user WHERE username = '$_GET[id]'");
    $row=$pick->fetch_assoc();
    $connect->query("DELETE FROM user WHERE username='$_GET[id]'");
    echo "<script>alert('User Deleted!')</script>";
    echo "<script>location='index.php?page=user';</script>";

?>