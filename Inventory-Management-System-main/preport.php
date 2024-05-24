<?php
include_once 'header.php';
include_once 'db.php';
?>

<div>
	<br><h2>Product wise Report</h2><br>
		<form class="form-inline" method="post" name="form1">
			<div>
				<input class="form-control mr-sm-2" style="width: 350px;" type="search" name="product" placeholder="Search Product">
				<br><button class="btn btn-primary" type="submit" name="submit">
					
						search
					
				</button>
			</div>
		</form>
	</div>

<div>
	<br><br>
<?php
if (isset($_POST['submit'])) 
{
	$product = $_POST['product'];
$res=mysqli_query($conn,"SELECT t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where p_ID = '$_POST[product]';");
	if(mysqli_num_rows($res)==0)
	{
		echo "Sorry! No data found";
	}
	else
	{
		
		echo "<table class='table table-bordered table-hover  table-dark'>";
		echo "<tr style='background-color: white'>";
		echo "<th>"; echo "Transaction ID";   echo "</th>";
		echo "<th>"; echo "Transaction Type";   echo "</th>";
		echo "<th>"; echo "Transaction Product";   echo "</th>";
		echo "<th>"; echo "Product ID";   echo "</th>";
		echo "<th>"; echo "Quantity";   echo "</th>";
		echo "<th>"; echo "Transaction Amount";   echo "</th>";
		echo "<th>"; echo "Transaction Date";   echo "</th>";
		echo "<th>"; echo "Transaction Time";   echo "</th>";
		echo "</tr>";
		while ($row=mysqli_fetch_assoc($res))
		 {
			echo "<tr>";
			echo "<td class='bg-success'>"; echo $row['t_ID']; echo "</td>";
			echo "<td class='bg-success'>"; echo $row['t_type']; echo "</td>";
			echo "<td class='bg-success'>"; echo $row['t_product']; echo "</td>";
			echo "<td class='bg-success'>"; echo $row['p_ID']; echo "</td>";
			echo "<td class='bg-success'>"; echo $row['t_unit']; echo "</td>";
			echo "<td class='bg-success'>"; echo $row['t_cost']; echo "</td>";
			echo "<td class='bg-success'>"; echo $row['t_date']; echo "</td>";
			echo "<td class='bg-success'>"; echo $row['t_time']; echo "</td>";

			echo "</tr>";
		}
		echo "</table>";
		echo "<br><br><br>";

		$res2=mysqli_query($conn,"SELECT SUM(t_unit) AS value_sum,t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where p_ID = '$_POST[product]' AND t_type = 'purchase';");
		$row2=mysqli_fetch_assoc($res2);

		$res3=mysqli_query($conn,"SELECT SUM(t_cost) AS value_sum,t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where p_ID = '$_POST[product]' AND t_type = 'purchase';");
		$row3=mysqli_fetch_assoc($res3);

		$res4=mysqli_query($conn,"SELECT SUM(t_unit) AS value_sum,t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where p_ID = '$_POST[product]' AND t_type = 'sell';");
		$row4=mysqli_fetch_assoc($res4);

		$res5=mysqli_query($conn,"SELECT SUM(t_cost) AS value_sum,t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where p_ID = '$_POST[product]' AND t_type = 'sell';");
		$row5=mysqli_fetch_assoc($res5);

		$profit = $row5['value_sum'] - $row3['value_sum'];


		echo "<table class='table table-bordered table-hover  table-dark'>";
		echo "<tr style='background-color: white'>";
		echo "<th>"; echo "Total Product Purchased";   echo "</th>";
		echo "<th>"; echo "Total Purchase Cost";   echo "</th>";
		echo "<th>"; echo "Total Product Sold";   echo "</th>";
		echo "<th>"; echo "Total Sell Cost";   echo "</th>";
		echo "<th>"; echo "Total Profit";   echo "</th>";
		echo "<th>"; echo "Total Loss";   echo "</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td class='bg-success'>"; echo $row2['value_sum']; echo "</td>";
		echo "<td class='bg-success'>"; echo $row3['value_sum']; echo "</td>";
		echo "<td class='bg-success'>"; echo $row4['value_sum']; echo "</td>";
		echo "<td class='bg-success'>"; echo $row5['value_sum']; echo "</td>";
		if($profit > 0)
		{
			echo "<td class='bg-success'>"; echo $profit; echo "</td>";
			echo "<td class='bg-success'>"; echo "0"; echo "</td>";
		}
		else
		{
			echo "<td class='bg-success'>"; echo "0"; echo "</td>";
			$loss = $row3['value_sum'] - $row5['value_sum'];
			echo "<td class='bg-success'>"; echo $loss; echo "</td>";
		}
		
		
		echo "</tr>";

		echo "</table>";

	}
}
?>
</div>

<div>
	
</div>
</body>
</html>
<style type="text/css">
	body{
		background-image: url("background.jpg");
		 height: 937px;
		 width: 1903px;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>
