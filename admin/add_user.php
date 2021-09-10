
<h4 class="card-title">Add User Section</h4>
<p class="card-description"></p>
<p></p>

<form class="forms-sample" method="post">
    <div class="form-group">
        <label for="exampleInputName1">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" />    
    </div>
    <div class="form-group">
        <label for="exampleInputName1">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email Address" />    
    </div>
    <div class="form-group">
        <label for="exampleInputName1">Phone Number</label>
        <input type="int" class="form-control"  name="phone" placeholder="Phone Number" />    
    </div>
    <div class="form-group">
        <label for="exampleInputEmail3">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Address" />
    </div>
    <div class="form-group">
        <label for="exampleInputEmail3">Password</label>
        <input type="text" class="form-control"name="password" placeholder="Password" />
    </div>
    <button type="submit" name="submit" class="btn btn-primary mr-2"> Submit </button>
    <button class="btn btn-light" onclick="relocate_page()" type="button">Cancel</button>
</form>

<?php 

    if(isset($_POST['submit'])){
        $connect->query("INSERT INTO user(username, email, phone, address_user, password)
                VALUES('$_POST[username]','$_POST[email]','$_POST[phone]','$_POST[address]','$_POST[password]')");
    echo "<script>
    alert ('Added Successfully!');
    document.location = 'index.php?page=user';
    </script>";
    }
?>

<script>
function relocate_page(){
     location.href = "index.php?page=add_user";
} 
</script>

