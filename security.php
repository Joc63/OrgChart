<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password is invalid";
}
else
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	if ($rows == 1) 
	{
		$_SESSION['login_user']=$username; // Initializing Session
		header("location: index.html"); // Redirecting To Other Page
	} else 
	{
		$error = "Username or Password is invalid";
	}
}
}
?>