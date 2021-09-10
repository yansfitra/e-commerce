
<h4 class="card-title">User List</h4><button type="button" class="btn btn-outline-primary btn-icon-text" onclick="relocate_page()">
        <i class="fa fa-plus"></i> Add User </button>
    <div class="table-responsive" style="margin-top: 12px;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <?php $number=1; ?>
                <?php $pick=$connect->query("SELECT * FROM user");?>
                <?php while($row=$pick->fetch_assoc()){?>
                <tr>
                    <th><?php echo $number; ?></th>
                    <th><?php echo $row['username']; ?></th>
                    <th><?php echo $row['email']; ?></th>
                    <th><?php echo $row['phone']; ?></th>
                    <th><?php echo $row['address']; ?></th>
                    <th>
                        <a href="index.php?page=edit_user&id=<?php echo $row['username']; ?>" class="btn-warning btn">Edit</a>
                        <a href="index.php?page=delete_user&id=<?php echo $row['username']; ?>" class="btn-danger btn">Delete</a>
                    </th>
                </tr>
                <?php $number++; ?>
                <?php
                } ?>
            </tbody>
        </table>
    </div>

<script>
function relocate_page(){
     location.href = "index.php?page=add_user";
} 
</script>