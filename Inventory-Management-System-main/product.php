<?php
include_once 'header.php';
require_once 'db.php';
if (isset($_POST['productbtn'])) {
	$productname = $_POST['productname'];
	$producttype = $_POST['producttype'];
	$productdesc = $_POST['productdesc'];
	$productunit = $_POST['productunit'];
	$productprice = $_POST['productprice'];

	$sql = "INSERT INTO product VALUES('','$productname','$producttype','$productdesc','$productunit','$productprice')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		?>
		<script type="text/javascript"> alert("Product Added Successfully") </script>
		<script type="text/javascript">window.location="product.php"</script>
		<?php
	}
	
}
if (isset($_GET['delete'])) {
	$productid = $_GET['delete'];
	$sql3 = "DELETE FROM product WHERE product_ID = {$productid}";
	$deletesql = mysqli_query($conn,$sql3);
	if ($deletesql) {
		?>
		<script type="text/javascript"> alert("Product Deleted Successfully") </script>
		<script type="text/javascript">window.location="product.php"</script>
		<?php
	}
}

?>
<div class="container shadow m-5 p-3">
	<h3>Add New Product</h3>
	<form action="" method="post" class="d-flex justify-content-around">
		<input class="form-control" type="text" name="productname" placeholder="Product Name">
		<input class="form-control" type="text" name="producttype" placeholder="Product Type">
		<input class="form-control" type="text" name="productdesc" placeholder="Product Description">
		<input class="form-control" type="text" name="productunit" placeholder="Product Unit">
		<input class="form-control" type="text" name="productprice" placeholder="Price per Unit">
		<input class="btn btn-success" type="submit" name="productbtn" value="Add">
	</form>
</div>
<div class="container m-5 p-3">
	<form action="" method="post" class="d-flex justify-content-around">
		<?php
		if (isset($_GET['update'])) {
			$productid= $_GET['update'];
			$sql = "SELECT * FROM product WHERE product_ID = {$productid}";
			$getdatasql = mysqli_query($conn,$sql);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getproductid = $row2['product_ID'];
				$getproductname = $row2['product_name'];
				$getproducttype = $row2['product_type'];
				$getproductdesc = $row2['product_desc'];
				$getproductunit = $row2['product_unit'];
				$getproductprice = $row2['product_unitprice'];
			
		?>
		<input class="form-control" type="text" name="productid" value="<?php echo $getproductid?>">
		<input class="form-control" type="text" name="productname" value="<?php echo $getproductname?>">
		<input class="form-control" type="text" name="producttype" value="<?php echo $getproducttype?>">
		<input class="form-control" type="text" name="productdesc" value="<?php echo $getproductdesc?>">
		<input class="form-control" type="text" name="productunit" value="<?php echo $getproductunit?>">
		<input class="form-control" type="text" name="productprice" value="<?php echo $getproductprice?>">
		<input class="btn btn-primary" type="submit" name="productupdatebtn" value="Update">
		<?php 
	}

		}?>
		<?php
		if (isset($_POST['productupdatebtn'])) {
			$updateproductid = $_POST['productid'];
			$updateproductname = $_POST['productname'];
			$updateproducttype = $_POST['producttype'];
			$updateproductdesc = $_POST['productdesc'];
			$updateproductunit = $_POST['productunit'];
			$updateproductprice = $_POST['productprice'];
			$sql = "UPDATE product SET product_ID='$updateproductid', product_name = '$updateproductname',product_type = '$updateproducttype', product_desc = '$updateproductdesc', product_unit = '$updateproductunit', product_unitprice = '$updateproductprice' WHERE product_ID = $productid";
			$updatesql = mysqli_query($conn,$sql);
			if ($updatesql) {
				?>
		<script type="text/javascript"> alert("Product Updated Successfully") </script>
		<script type="text/javascript">window.location="product.php"</script>
		<?php
			}
		}
		?>
	</form>
</div>
<div class="container">
	<table class="table table-bordered table-hover  table-dark" style="">
		<tr style='background-color: white'>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Product Type</th>
			<th>Product Description</th>
			<th>Product Unit</th>
			<th>Price per Unit</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		<?php
		$sql2 = "SELECT * FROM product";
$readsql = mysqli_query($conn,$sql2);
if ($readsql -> num_rows > 0) {
	while ($row = mysqli_fetch_assoc($readsql)) {
		$showproductid = $row['product_ID'];
		$showproductname = $row['product_name'];
		$showproducttype = $row['product_type'];
		$showproductdesc = $row['product_desc'];
		$showproductunit = $row['product_unit'];
		$showproductprice = $row['product_unitprice'];
		?>
		<tr>
			<td class='bg-success'><?php echo $showproductid ?></td>
			<td class='bg-success'><?php echo $showproductname ?></td>
			<td class='bg-success'><?php echo $showproducttype ?></td>
			<td class='bg-success'><?php echo $showproductdesc ?></td>
			<td class='bg-success'><?php echo $showproductunit ?></td>
			<td class='bg-success'><?php echo $showproductprice ?></td>
			<td class='bg-success'><a href="product.php?update=<?php echo $showproductid;?>" class="btn btn-info">Update</a></td>
			<td class='bg-success'><a href="product.php?delete=<?php echo $showproductid;?>" class="btn btn-danger">Delete</a></td>
			
		</tr>
		<?php }
} ?>
	</table>
</div>

<style type="text/css">
	body{
		background-image: url("product.jpg");
		
		 height: 100%;
		 width: 100%;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>