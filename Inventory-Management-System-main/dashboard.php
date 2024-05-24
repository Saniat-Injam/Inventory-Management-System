<?php
include_once 'header.php';
require_once 'db.php';
?>

<div class = "newbody">


		<section class="dindex-intro">
		<h1>Dashboard</h1>
		</section>
		<section class="index-categories">
			<br><br><br>
			<div class="index-categories-list">
				<div class="dbox1">
					<?php
					$sql = "SELECT COUNT(t_ID) AS NumberOfProducts FROM transaction where t_type = 'Purchase';";
					$getdatasql = mysqli_query($conn,$sql);
					while ($row=mysqli_fetch_assoc($getdatasql)) {
					$getdata = $row['NumberOfProducts'];
					}
					echo "<h3> Total Purchase: "."$getdata </h3>";
					?>
				</div>
				<div class="dbox2">
					<?php
					$sql2 = "SELECT COUNT(t_ID) AS NumberOfProducts FROM transaction where t_type = 'Sell';";
					$getdatasql2 = mysqli_query($conn,$sql2);
					while ($row2=mysqli_fetch_assoc($getdatasql2)) {
					$getdata2 = $row2['NumberOfProducts'];
					}
					echo "<h3> Total Sell: "."$getdata2 </h3>";
					?>
				</div>
				<div class="dbox3">
					<?php
					$sql3 = "SELECT COUNT(t_ID) AS NumberOfProducts FROM transaction;";
					$getdatasql3 = mysqli_query($conn,$sql3);
					while ($row3=mysqli_fetch_assoc($getdatasql3)) {
					$getdata3 = $row3['NumberOfProducts'];
					}
					echo "<h3> Total Transaction: "."$getdata3 </h3>";
					?>
				</div>
				
			</div>
			
		</section>
</div>
<br>
<br>
<br>
<div class = "report">
	<a href="dreport.php" style = "width:400px;"class="btn btn-success btn-lg btn-block">See Daily Transaction Report</a>
	<br>
	<br>
	<a href="mreport.php" style = "width:400px;"class="btn btn-success btn-lg btn-block">See Monthly Transaction Report</a>
	<br>
	<br>
	<a href="preport.ph








































	p" style = "width:400px;"class="btn btn-success btn-lg btn-block">See Product wise Transaction Report</a>
</div>
<style type="text/css">
	body{
		background-image: url("dashboard.png");
		
		 height: 925px;
		 width: 100%;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>