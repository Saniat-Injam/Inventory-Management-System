<?php
include_once 'header.php';
?>
	
	<div class="loginform">
		 <h1>Admin <br>Log In</h1>
		<form action="login.inc.php" method="post" >
			<input type="text" name="uid" class="inputbox" placeholder="User ID"><br><br>
			<input type="password" name="pwd" class="inputbox" placeholder="Password"><br><br>
			<button type="submit" name="submit" class="btn btn-success">Login</button>
			<p class="conf">Don't have an account?  <a href="signup.php">Sign Up</a></p>
		</form>
		<div class="message">
	<?php
if(isset($_GET["error"]))
{
	if ($_GET["error"] == "emptyinput") 
	{
		echo "<p> Fill in all fields</p>";
	}
	elseif ($_GET["error"] == "wronglogin") 
	{
		echo "<p>Invalid Username</p>";
	}
	elseif ($_GET["error"] == "wrongpassword") 
	{
		echo "<p> Password is Incorrect</p>";
	}

	

}
?>
</div>

	</div>



	 
<style type="text/css">
	body{
		background-image: url("background.jpg");
		 height: 927px;

		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
	}
</style>