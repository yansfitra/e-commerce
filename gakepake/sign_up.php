<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
    <meta charset="utf-8">
    <title>Sign Up</title>
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
    <div class="signup_box">
    <img src="foto_login/avatar.jpg" class ="avatar" >
        <h1>Sign Up</h1>
        <form method="post" action="login.php">
            <p>Email Address</p>
            <input type="email" name="email_user" placeholder="Enter your email address">
            <p>Username</p>
            <input type="text" name="username_user" placeholder="Enter username">
            <p>Password</p>
            <input type="password" name="password_user" placeholder="Enter password">
            <p>Phone Number</p>
            <input type="int" name="phone_user" placeholder="Enter phone number">
            <p>Address</p>
            <input type="text-area" name="address_user" placeholder="Enter your home address">
            <input type="submit" name="ok" value="Login">

        </form>
    </div>

</body>
</html>