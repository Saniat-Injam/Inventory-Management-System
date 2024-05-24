<?php
include_once 'header.php';
require_once 'db.php';
?>
<br>
<br>
<form action="" method="post" class="d-flex justify-content-around">
		<select name="month" class="custom-select" style="width: 300px;">
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
	    <select name="year" class="custom-select" style="width: 300px;">
	    <option disabled selected>Select Year</option>
	    <option>2021</option>
		<option>2022</option>
	    </select>
		<button class="btn btn-success" type="submit" style="margin-right: 1000px;" name="showbtn">
			Show
		</button>
	</form>
<div>
<?php
if (isset($_POST['showbtn'])) 
{
	$month = $_POST['month'];
	$year = $_POST['year'];
	echo "<br><br><h2 style='color:#2c3e50; margin-left:650px;'>Monthly Report of "."$month $year</h2><br>";
	$q = mysqli_query($conn,"SELECT * FROM transaction where t_month = '$_POST[month]' AND t_year = '$_POST[year]';");
	if(mysqli_num_rows($q)==0)
	{
		echo "Sorry! Your desired product is not available right now";
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
		while ($row=mysqli_fetch_assoc($q))
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

		$res2=mysqli_query($conn,"SELECT SUM(t_unit) AS value_sum,t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where t_month = '$_POST[month]' AND t_type = 'purchase';");
		$row2=mysqli_fetch_assoc($res2);

		$res3=mysqli_query($conn,"SELECT SUM(t_cost) AS value_sum,t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where t_month = '$_POST[month]' AND t_type = 'purchase';");
		$row3=mysqli_fetch_assoc($res3);

		$res4=mysqli_query($conn,"SELECT SUM(t_unit) AS value_sum,t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where t_month = '$_POST[month]' AND t_type = 'sell';");
		$row4=mysqli_fetch_assoc($res4);

		$res5=mysqli_query($conn,"SELECT SUM(t_cost) AS value_sum,t_ID,t_type,t_product,p_ID,t_unit,t_cost,t_date,t_time,t_month FROM transaction where t_month = '$_POST[month]' AND t_type = 'sell';");
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