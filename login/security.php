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
		include '../db/connection.php';
		$conn = db_connection();
		$sqlResult  = sqlsrv_query($conn,"select * from Users where reloj=$username");
		while ($row = sqlsrv_fetch_array($sqlResult))
		{
			if ($password == $row['password'])
			{
				$_SESSION['login_user'] = $row['reloj'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['Dept'] = $row['Dept'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['autentificado'] = 1;
				header("location: ../index.php"); // Redirecting To Other Page
				break;
			}
			else 
			{
				$error = "Username or Password is invalid";

			}
	
		}

	}
}
?>