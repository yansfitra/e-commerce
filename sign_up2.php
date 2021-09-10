<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    $connect = mysqli_connect('localhost', 'root', '', 'yans_store');
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone_num'];
    $password = $_POST['password'];
    $submit = $_POST['signup'];

    if($submit){
        $sql = "SELECT * FROM user where email = '$email'";
        $sql_ = "SELECT * FROM user where username = '$username'";
        $query = mysqli_query($connect, $sql);
        $query_ = mysqli_query($connect, $sql_);
        $check_email = mysqli_fetch_array($query);
        $check_username = mysqli_fetch_array($query_);

        if(mysqli_num_rows($query)){
            echo "<script>
            alert ('Email is already exist!, Please use the other!');
            document.location = 'sign_up2.php';
            </script>"; 
        }
        
        elseif($check_username==0){
            $sql1 = "INSERT INTO user (username, password, email, phone, address)
                    VALUE ('$username', '$password', '$email', '$phone', '$address')";
            $query1 = mysqli_query($connect, $sql1);

            echo "<script>
            alert('Register Successful!');
            document.location = 'login2.php';
            </script>";
        }
        else{
            echo "<script>
            alert ('Username is already exist!, Please use the other!');
            document.location = 'sign_up2.php';
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
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login_css/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login_css/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Userame"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="address" id="address" placeholder="Your Home Address"/>
                            </div>
                            <div class="form-group">
                                <label for="phone_num"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="int" name="phone_num" id="phone_num" placeholder="Your Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="login_css/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login2.php" class="signup-image-link">I am already member</a>
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