<?php
include_once 'header.php';
require_once 'db.php';
if (isset($_POST['purchasebtn'])) {
	$tproduct = $_POST['tproduct'];
	$pid = $_POST['pid'];
	$tunit = $_POST['tunit'];
	$tcost = $_POST['tcost'];


	$sql = "INSERT INTO transaction VALUES('','$_POST[type]','$tproduct','$pid','$tunit','$tcost',CURDATE(),CURTIME(),'$_POST[month]','$_POST[year]')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		$unit = $tunit;
		$id = $pid;
		$sql2 = "SELECT * FROM product WHERE product_ID = {$id}";
		$getdatasql = mysqli_query($conn,$sql2);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getproductunit = $row2['product_unit'];
			}
			$updateunit = $unit + $getproductunit;
			$sql3 = "UPDATE product SET product_unit = '$updateunit' WHERE product_ID = $id";
			$connsql2 = mysqli_query($conn,$sql3);
	}
	
}


?>
<div class="purchase">
<div class="container shadow m-5 p-3">
	<h3><b>Purchase Product Stock</b></h3>
	<form action="" method="post" class="d-flex justify-content-around">
		<select name="type" class="custom-select" style="width: 500px;">
	    <option disabled selected>Transaction Type</option>
	    <option>Purchase</option>
		<option>Sell</option>
	    </select>
		<input class="form-control" type="text" name="tproduct" placeholder=" Transaction Product">
		<input class="form-control" type="text" name="pid" placeholder="Product ID">
		<input class="form-control" type="text" name="tunit" placeholder="Transaction Unit">
		<input class="form-control" type="text" name="tcost" placeholder="Transaction Cost">
		<select name="month" class="custom-select" >
	    <option disabled selected>Select Month</option>
	    <option>January</option>
		<option>February</option>
		<option>March</option>
		<option>April</option>
		<option>May</option>
		<option>June</option>
		<option>July</option>
		<option>August</option>
		<option>September</option>
		<option>October</option>
		<option>November</option>
		<option>December</option>
	    </select>
	    <select name="year" class="custom-select" style="width: 500px;">
	    <option disabled selected>Select Year</option>
	    <option>2021</option>
		<option>2022</option>
	    </select>

		<input class="btn btn-success" type="submit" name="purchasebtn" value="Purchase">
	</form>
</div>
</div>

<?php
if (isset($_POST['sellbtn'])) {
	$tproduct = $_POST['tproduct'];
	$pid = $_POST['pid'];
	$tunit = $_POST['tunit'];
	$tcost = $_POST['tcost'];


	$sql = "INSERT INTO transaction VALUES('','$_POST[type]','$tproduct','$pid','$tunit','$tcost',CURDATE(),CURTIME(),'$_POST[month]','$_POST[year]')";
	$connsql = mysqli_query($conn,$sql);
	if ($connsql) {
		$unit = $tunit;
		$id = $pid;
		$sql2 = "SELECT * FROM product WHERE product_ID = {$id}";
		$getdatasql = mysqli_query($conn,$sql2);
			while ($row2=mysqli_fetch_assoc($getdatasql)) {
				$getproductunit = $row2['product_unit'];
			}
			$updateunit = $getproductunit - $unit;
			$sql3 = "UPDATE product SET product_unit = '$updateunit' WHERE product_ID = $id";
			$connsql2 = mysqli_query($conn,$sql3);
	}
	
}


?>
<div class="sell">
<div class="container shadow m-5 p-3">
	<h3><b>Sell Product Stock</b></h3>
	<form action="" method="post" class="d-flex justify-content-around">
		<select name="type" class="custom-select" style="width: 500px;">
	    <option disabled selected>Transaction Type</option>
	    <option>Purchase</option>
		<option>Sell</option>
	    </select>
		<input class="form-control" type="text" name="tproduct" placeholder=" Transaction Product">
		<input class="form-control" type="text" name="pid" placeholder="Product ID">
		<input class="form-control" type="text" name="tunit" placeholder="Transaction Unit">
		<input class="form-control" type="text" name="tcost" placeholder="Transaction Cost">
		<select name="month" class="custom-select" >
	    <option disabled selected>Select Month</option>
	    <option>January</option>
		<option>February</option>
		<option>March</option>
		<option>April</option>
		<option>May</option>
		<option>June</option>
		<option>July</option>
		<option>August</option>
		<option>September</option>
		<option>October</option>
		<option>November</option>
		<option>December</option>
	    </select>
	    <select name="year" class="custom-select" style="width: 500px;">
	    <option disabled selected>Select Year</option>
	    <option>2021</option>
		<option>2022</option>
	    </select>
		<input class="btn btn-success" type="submit" name="sellbtn" value="Sell">
	</form>
</div>
</div>


<style type="text/css">
	body{
		background-image: url("stock.jpg");
		
		 height: 900px;
		 width: 100%;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>