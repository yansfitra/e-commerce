<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    $connect = mysqli_connect('localhost', 'root', '', 'yans_store');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['signin'];

    if($submit){
        $sql = "SELECT * FROM user where username = '$username' and password = '$password'";
        $sql_ = "SELECT * FROM admin where username = '$username' and password = '$password'";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);
        $query_ = mysqli_query($connect, $sql_);
        $row_ = mysqli_fetch_array($query_);
        
       // $row = $query->num_rows;

        if($row['username'] != ''){
  
            $_SESSION['user'] = $row;
            echo "<script> document.location = 'index.php';
            alert ('You logged in as $row[username]');
            </script>";
        }elseif($row_['username'] != ''){
            $_SESSION['user'] = $row_;
            echo "<script> document.location = 'admin/index.php?page=home';
            alert ('You logged in as $row_[username]');
            </script>";
        }
        else{
            echo "<script> document.location = 'login2.php';
            alert('Login Failed');
            </script>";
        }
    }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login_css/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login_css/css/style.css">
</head>
<body>

    <div class="main">
        <!-- Sign in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="login_css/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="sign_up2.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="login_css/vendor/jquery/jquery.min.js"></script>
    <script src="login_css/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>