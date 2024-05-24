<?php
include_once 'header.php';
require_once 'db.php';
?>
<form class="form-inline" method="post" name="form1">
  <div class="form-group">
  	<br><br>
    <h3>Search Products</h3>
    <br>
    <input type="text" class="form-control" name="search" style="width: 400px;" placeholder="Search Products">
    <br>
  	<button type="submit" name="submit" class="btn btn-success">Search</button>
</form>

<br><br><h2 style="color: #ecf0f1;">Product Stock Status</h2><br>
<div>
<?php
if (isset($_POST['submit'])) 
{
	$q=mysqli_query($conn,"SELECT * FROM product where product_name LIKE '%$_POST[search]%';");
	if(mysqli_num_rows($q)==0)
	{
		echo "Sorry! Your desired medicine is not available right now";
	}
	else
	{
		echo "<table class='table table-bordered table-hover  table-dark'>";
echo "<tr style='background-color: white'>";
echo "<th>"; echo "Product ID";   echo "</th>";
echo "<th>"; echo "Product Name";   echo "</th>";
echo "<th>"; echo "ProductType";   echo "</th>";
echo "<th>"; echo "Quantity";   echo "</th>";
echo "<th>"; echo "Price per Unit in BDT";   echo "</th>";
echo "</tr>";
while ($row=mysqli_fetch_assoc($q))
 {
	echo "<tr>";
	echo "<td class='bg-success'>"; echo $row['product_ID']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['product_name']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['product_type']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['product_unit']; echo "</td>";
	echo "<td class='bg-success'>"; echo $row['product_unitprice']; echo "</td>";

	echo "</tr>";
}
echo "</table>";
	}
}
?>

<style type="text/css">
	body{
		background-image: url("transaction.png");
		
		 height: 900px;
		 width: 100%;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>