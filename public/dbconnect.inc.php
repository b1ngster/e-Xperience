<?php
/*
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

*/
//set connectoion variables to match DB details
$host = "localhost";
$username = "sneakybandit";
$password = "webtech2021";
$database = "experience";

//connect to database
$dbconnection = mysqli_connect($host, $username, $password, $database);

//check if connected, exit if not
if(!$dbconnection) {
	exit("Database could not be connected.");
}
