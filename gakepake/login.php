<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    $connect = mysqli_connect ('localhost','root', '', 'yans_store');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['ok'];

    if($submit){
        $sql = "SELECT * FROM admin where username='$username' and password ='$password'";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);
        
        if($row['username'] != ''){
            $_SESSION['username'] = $row['username'];
            echo "<script> document.location = 'index.php';
            alert ('You logged in as $row[username]');
            </script>";
        }
        else{
            echo "<script> document.location = 'login.php';
            alert('Login Failed');
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    
<body style = "background-color:DarkOrange">
    <div class="jumbroton text-center">
        <h1>Yans E-commerce</h1>
        <p>Let's spend your money with a good quality products!</p>
    </div>
    <div class="loginbox">
    <img src="foto_login/avatar.jpg" class ="avatar" >
        <h1>Login</h1>
        <form method="post" action="login.php">
            <p>Username</p>
            <input type="text" name="username">
            <p>Password</p>
            <input type="password" name="password">
            <input type="submit" name="ok" value="Login">
            <a href="#">Forget your password?</a><br>
            <a href="#">I don't have an account</a><br>
            
        </form>
    </div>

</body>
</html>