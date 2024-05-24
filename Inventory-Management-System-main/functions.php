<?php
function emptyInputSignup($firstname,$lastname,$email,$username,$pwd,$pwdrepeat){
	$result;
	if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
		$result = true;
		
	}
	else{
		$result = false;
	}
	return $result;
}
function invalidUid($uername){
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		$result = true;
		
	}
	else{
		$result = false;
	}
	return $result;
}
function invalidEmail($email){
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
		
	}
	else{
		$result = false;
	}
	return $result;
}
function invalidpwd($pwd){
	$result;
	if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$pwd)) {
		$result = true;
		
	}
	else{
		$result = false;
	}
	return $result;
}
function pwdMatch($pwd,$pwdrepeat){
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;
		
	}
	else{
		$result = false;
	}
	return $result;
}
function uidExists($conn, $username, $email){
	$sql = "SELECT * FROM admin WHERE adminsAid = ? OR adminsEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("location: signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $username,$email);
	mysqli_stmt_execute($stmt);

	$resultdata = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_assoc($resultdata)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}

mysqli_stmt_close($stmt);
}

function createuser($conn,$firstname,$lastname,$email,$username,$pwd){
	$sql = "INSERT INTO admin(adminsFirstname,adminsLastname,adminsEmail,adminsAid,adminsPwd,adminsImage) VALUES(?, ?, ?, ?, ?,'a.png');";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("location: signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt, "sssss", $firstname,$lastname,$email,$username,$hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: signup.php?error=none");
		exit();
}

function emptyInputLogin($username,$pwd){
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
		
	}
	else{
		$result = false;
	}
	return $result;
}

function loginUser($conn,$username,$pwd)
{
	$uidExists = uidExists($conn,$username,$username);
	if($uidExists === false)
	{
		header("location: login.php?error=wronglogin");
		exit();
	}
	else
	{
		$pwdHashed = $uidExists["adminsPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);
	if ($checkPwd === false) {
		header("location: login.php?error=wrongpassword");
		exit();
	}
	else if ($checkPwd === true) 
	{
		session_start();
		$_SESSION["userid"] = $uidExists["adminsId"];
		$_SESSION["useruid"] = $uidExists["adminsAid"];

		header("location: index.php");
		exit();
	}
	}

	
}
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
