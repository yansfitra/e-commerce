<h4 class="card-title">Add Product Section</h4>
<p class="card-description"></p>
<p></p>



<form class="forms-sample" method="post">
    <div class="form-group">
        <label>Product Photo upload</label>
        <div class="input-group ">
            <input type="file" name="img" class="form-control" id="customFile"  />
        </div>
    </div>
  <div class="form-group">
    <label for="exampleInputName1">Product Name</label>
    <input type="text" class="form-control" name="product_name" placeholder="Product name" />
  </div>
  <div class="form-group">
    <label for="exampleInputEmail3">Price</label>
    <input type="int" class="form-control" name="product_price" placeholder="price" />
  </div>
  <button type="submit" name="submit" class="btn btn-primary mr-2"> Submit </button>
  <button class="btn btn-light" onclick="relocate_page()" type="button">Cancel</button>
</form>


<?php 

    if(isset($_POST['submit'])){
        $connect->query("INSERT INTO product(product_name, product_price, product_photo)
                VALUES('$_POST[product_name]','$_POST[product_price]','$_POST[img]')");
    echo "<script>
    alert ('Added Successfully!');
    document.location = 'index.php?page=inventory';
    </script>";
    }
?>

<script>
function relocate_page()
{
     location.href = "index.php?page=inventory";
} 
</script>

