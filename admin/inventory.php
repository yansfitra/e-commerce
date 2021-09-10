
<h4 class="card-title">Products Listing</h4><button type="button" class="btn btn-outline-primary btn-icon-text" onclick="relocate_page()">
    <i class="fa fa-plus"></i> Add Product </button>
<div class="table-responsive" style="margin-top: 12px;">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Name</th>
                <th>Price</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php $number=1;?>
            <?php $pick=$connect->query("SELECT * FROM product"); ?>
            <?php while($row=$pick->fetch_assoc()){?>
            <tr>
                <th><?php echo $number; ?></th>
                <th>
                    <img src="../foto_product/<?php echo $row['product_photo']; ?>" style="width:120px;height:120px; border-radius:10%" >
                </th>
                <th><?php echo $row['product_name']; ?></th>
                <th><?php echo $row['product_price']; ?></th>
                <th>
                    <a href="index.php?page=edit_product&id=<?php echo $row['product_id']; ?>" class="btn-warning btn">Edit</a>
                    <a href="index.php?page=delete_product&id=<?php echo $row['product_id']; ?>" class="btn-danger btn">Delete</a>
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
     location.href = "index.php?page=add_product";
} 
</script>
