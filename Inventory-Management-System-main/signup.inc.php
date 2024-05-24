<?php
if(isset($_POST['submit'])){
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$pwdrepeat = $_POST['pwdrepeat'];

	require_once 'db.php';
	require_once 'functions.php';

	if (emptyInputSignup($firstname,$lastname,$email,$username,$pwd,$pwdrepeat) !== false) {
		header("location: signup.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username) !== false) {
		header("location: signup.php?error=invaliduid");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: signup.php?error=invalidemail");
		exit();
	}
	if (invalidpwd($pwd) !== false) {
		header("location: signup.php?error=invalidpwd");
		exit();
	}
	if (pwdMatch($pwd,$pwdrepeat) !== false) {
		header("location: signup.php?error=passwordsdontmatch");
		exit();
	}
	if (uidExists($conn,$username,$email) !== false) {
		header("location: signup.php?error=usernametaken");
		exit();
	}

	createuser($conn,$firstname,$lastname,$email,$username,$pwd);

	
	
}
else{
	header("location: signup.php");
	exit();
}


?>