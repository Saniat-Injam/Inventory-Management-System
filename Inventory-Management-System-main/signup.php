<?php
include_once 'header.php';
?>
	
	 <div class="signupform">
		<h1>Admin<br> Sign Up</h1>
		<form action="signup.inc.php" method="post" >
			<input type="text" name="fname" class="inputbox" placeholder="First Name"><br><br>
			<input type="text" name="lname" class="inputbox" placeholder="Last Name"><br><br>
			<input type="text" name="email" class="inputbox" placeholder="Email"><br><br>
			<input type="text" name="uid" class="inputbox" placeholder="User ID"><br><br>
			<input type="password" name="pwd" class="inputbox" placeholder="Password"><br><br>
			<input type="password" name="pwdrepeat" class="inputbox" placeholder=" Repeat your Password"><br><br>
			<button type="submit" name="submit" class="btn btn-success">Register</button>
			<p class="conf">Do you have an account?  <a href="login.php">Log in</a></p>
		</form>

<div class="message">
	<?php
if(isset($_GET["error"]))
{
	if ($_GET["error"] == "emptyinput") 
	{
		echo "<p> Fill in all fields</p>";
	}
	elseif ($_GET["error"] == "invaliduid") 
	{
		echo "<p> Choose a proper username</p>";
	}
	elseif ($_GET["error"] == "invalidemail") 
	{
		echo "<p> Choose a proper email</p>";
	}
	elseif ($_GET["error"] == "invalidpwd") 
	{
		echo "<p> Password must contain an uppercase, a lowercase, a number, a special character.</p>";
	}
	elseif ($_GET["error"] == "passwordsdontmatch") 
	{
		echo "<p> Passwords are not matching</p>";
	}
	elseif ($_GET["error"] == "stmtfailed") 
	{
		echo "<p> Something went wrong. Please try again</p>";
	}
	elseif ($_GET["error"] == "usernametaken") 
	{
		echo "<p> Username already exists. Choose a different username</p>";
	}
	elseif ($_GET["error"] == "none") 
	{
		echo "<p> Signup successful!</p>";
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
