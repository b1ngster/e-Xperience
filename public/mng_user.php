<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include("dbconnect.inc.php");

$action = $_GET['action'];

$callback = $_GET['callback'];

echo $callback . "(";

$response = "";



if($action=="register") {

	//For students
	//TO-DO: Add hashing / salting / encryption
	//TO-DO: Add checking for confirming password etc.
	//TO-DO: Add checking for existing username to be unique.

	//flags for validation checking
	$isValid = true;
	$validMsg = "";

	//get vars from POST
	$username = $_GET['r_username'];
	$password = password_hash($_GET['r_password'], PASSWORD_DEFAULT);
	$email = $_GET['r_email'];
	$dob = $_GET['r_email'];
	$firstName = $_GET['r_firstname'];
	$lastName = $_GET['r_lastname'];

	//get vars and check if valid
	if($username=="") {
		$isValid = false;
		$validMsg.="<p>Please enter a username</p>";
	}

	if($password=="") {
		$isValid = false;
		$validMsg.="<p>Please enter a password</p>";
	}

	if($firstName=="") {
		$isValid = false;
		$validMsg.="<p>Please enter a first name</p>";
	}

	if($lastName=="") {
		$isValid = false;
		$validMsg.="<p>Please enter a last name</p>";
	}

	if($isValid) {

		$sql = "SELECT * FROM `USER` WHERE  `u_username`='{$username}'";
		//insert user with details
		$result = mysqli_query($dbconnection, $sql);

		$row = $result->fetch_assoc();
		$hash = $row['u_password'];
		
//Prefixes for return messages in all-caps followed by a colon
//EXAMPLE:
//we use string operations in javascript to determine what actions
//to perform based on the prefix
		
		if(!$row['u_username']){

		//insert user with details

		$query = "INSERT INTO `USER`(`u_username`,`u_password`,`u_emailaddress`,`u_firstname`,`u_lastname`) VALUES ('{$username}','{$password}','{$email}', '{$firstName}','{$lastName}')";
		$result = mysqli_query($dbconnection,
					$query);
		
		//check if inserted or not
		if($result) {
			$response = "<p>Thank you for registering.  Please click the login button to login.</p>";
		} else {
			$response = $query; //"<p>There has been a problem with registering.  Please try again.</p>";
		}
	}else{
		$response = "<p>Sorry that username is taken.</p>";

	}

	} else {
		$response = $validMsg;
	}

}

if($action=="login") {	

	//TO-DO: Encryption support

	//flags for validation checking
	$isValid = true;
	$validMsg = "";

	//get vars from POST
	$username = $_GET['l_username'];
	$password = $_GET['l_password'];

	//get vars and check if valid
	if($username=="") {
		$isValid = false;
		$validMsg.="<p>Please enter a username</p>";
	}

	if($password=="") {
		$isValid = false;
		$validMsg.="<p>Please enter a password</p>";
	}

	if($isValid) {
		$sql = "SELECT * FROM `USER` WHERE  `u_username`='{$username}'";
		//insert user with details
		$result = mysqli_query($dbconnection, $sql);

		$row = $result->fetch_assoc();
		$hash = $row['u_password'];
		
//Prefixes for return messages in all-caps followed by a colon
//EXAMPLE:
//we use string operations in javascript to determine what actions
//to perform based on the prefix
		
		if($row['u_username']){
		if(password_verify($password, $hash)) {
			
			$userid = $row['user_id'];

			$response = "LOGGEDIN:" . $userid;
		} else {
			$response = "NOTFOUND:" .  "<p>Your password is incorrect.</p>";
		}  
	}

	} else {
		$response = "INVALID:" ."<p>Your username is incorrect.</p>" . $validMsg;
	}

}

$array = array("response" => $response);

echo json_encode($array);

echo ")";