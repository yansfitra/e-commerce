<?php 
    $pick = $connect->query("SELECT * FROM user WHERE username = '$_GET[id]'");
    $row=$pick->fetch_assoc();
?>

<h4 class="card-title">Edit User Section</h4>
<p class="card-description"></p>
<p></p>

<form class="forms-sample" method="post">
    <div class="form-group">
        <label for="exampleInputName1">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row['username'] ?>" />    
    </div>
    <div class="form-group">
        <label for="exampleInputName1">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $row['email'] ?>"/>    
    </div>
    <div class="form-group">
        <label for="exampleInputName1">Phone Number</label>
        <input type="int" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $row['phone'] ?>"/>    
    </div>
    <div class="form-group">
        <label for="exampleInputEmail3">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $row['address'] ?>"/>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail3">Password</label>
        <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $row['password'] ?>" />
    </div>
    <button type="submit" name="submit" class="btn btn-primary mr-2"> Submit </button>
    <button class="btn btn-light" onclick="relocate_page()" type="button">Cancel</button>
</form>

<?php 

    if(isset($_POST['submit'])){
        $connect->query("UPDATE user SET username='$_POST[username]', email='$_POST[email]',
                                        phone='$_POST[phone]', address='$_POST[address]',
                                        password='$_POST[password] 'WHERE username='$_GET[id]'");

        echo "<script>
        alert ('Edit Successfully!');
        document.location = 'index.php?page=user';
        </script>";
    }
?>

<script>
function relocate_page(){
     location.href = "index.php?page=user";
} 
</script>

