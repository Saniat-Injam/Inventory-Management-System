<?php
session_start();
include_once 'db.php';
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Inventory Management</title>
	<link rel="icon" href="icon.png">
	<link rel="stylesheet"  href="style.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<header>
		<img height="100px" width="220px" class="logo" src="inventorylogo.png">
		
	
	<nav>
		<div class="navbar">
			<ul>
			    <?php
			    if(isset($_SESSION['useruid']))
			    {
			    	$var = $_SESSION['useruid'];
			    	$sql = mysqli_query($conn,"SELECT adminsImage FROM admin where adminsAid = '$var';");
			    	$row = mysqli_fetch_assoc($sql);
			    	$var2 =$row['adminsImage'];
			    	echo "<li><a href='index.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'> Home</a></li>";
			    	echo " <li><a href='logout.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Logout</a></li>";
			    	echo "<img class='rounded-circle'height= 30 width =30 src='images/$var2'>";
			    	echo "<p>Hello there, " . $_SESSION["useruid"] . "</p>";

			    }
			    else
			    {
			    	echo "<li><a href='home.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'> Home</a></li>";
			    	echo "<li><a href='signup.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Signup</a></li>";
			    	echo " <li><a href='login.php' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Login</a></li>";
			    }
			    ?>
		    </ul>
		</div>
		
	</nav>
	</header>
